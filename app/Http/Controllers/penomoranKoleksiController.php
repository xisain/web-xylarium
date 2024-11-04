<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\penomoranKoleksi;
use App\Models\penerimaan;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\penomoranKoleksiExport;
use App\Models\tanaman;

class penomoranKoleksiController extends Controller
{

    public function export()
    {
        $penomoran = penomoranKoleksi::with('penerimaan')->get();
        return Excel::download(new penomoranKoleksiExport($penomoran), 'penomoran_koleksi.xlsx');
    }


    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {

        $penomoran = PenomoranKoleksi::with('penerimaan')->with('user')->get();
        return view('penomorankoleksi.index', compact('penomoran'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        // Get the highest `nomor_koleksi` value
        $maxNomorKoleksi = tanaman::max('id');
        $newNomorKoleksi = $maxNomorKoleksi ? $maxNomorKoleksi + 1 : 1;

        // Pad the new `nomor_koleksi` with leading zeros (6 digits)
        $paddedNomorKoleksi = str_pad($newNomorKoleksi, 6, '0', STR_PAD_LEFT);

        // Fetch the penerimaan with status 'layak'
        $penerimaan = Penerimaan::where('status', 'layak')->get();

        // Pass the data to the view
        return view('penomorankoleksi.create', [
            'penerimaan' => $penerimaan,
            'paddedNomorKoleksi' => $paddedNomorKoleksi,
        ]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'date' => 'required',
            'penerimaan_id' => 'required|exists:penerimaans,id', // Ensure this is correctly set
            'nomor_koleksi' => 'required',
            'keterangan' => 'nullable|string|max:255',
            'author_id' => 'required|exists:users,id'
        ]);
        penomoranKoleksi::create($validatedData);
        return redirect()->route('penomorankoleksi.index')->with('success', 'Data berhasil ditambahkan');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penomoran = penomoranKoleksi::with('penerimaan')->with('user')->findOrFail($id);
        return view("penomoranKoleksi.show", compact("penomoran"));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penomoran = penomoranKoleksi::findOrfail($id);
        return view("penomoranKoleksi.edit", compact("penomorankoleksi"));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validate = $this->validate($request, [
            'date' => 'required',
            'penerimaan_id' => 'required|exists:penerimaans,id', // Ensure this is correctly set
            'nomor_koleksi' => 'required',
            'keterangan' => 'nullable|string|max:255',
            'author_id' => 'required|exists:users,id'
        ]);
        penomoranKoleksi::findOrFail($id)->update($request->all());
        return redirect()->route("penomorankoleksi.index")->with("success", "Data terupdate");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penomoran = penomoranKoleksi::findOrfail($id);
        $penomoran->delete();
        return redirect()->route("penomorankoleksi.index")->with("success", "Data Terhapus");
    }
}
