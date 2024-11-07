<?php

namespace App\Http\Controllers;

use App\Models\pengeringan;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\tanaman;
use App\Models\penomoranKoleksi;
use App\Models\pbtk;
use App\Models\pnptk;
use App\Models\polatrapesium;
use App\Models\anatomiMikroskopis;
use App\Models\anatomiMakroskopis;
use App\Models\dokumentasiKoleksi;
use App\Models\pembuatanBahanKoleksi;

class TanamanController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
{
    $tanamans = tanaman::get(); // Fetch all data for DataTable

    return view('tanaman.index', [
        'tanamans' => $tanamans,
    ]);
}


    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        $penomoranKoleksi = penomoranKoleksi::all();
        return view('tanaman.create', compact('penomoranKoleksi'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        // // Custom validation rules
        $validatedData = $request->validate([
            'no_ketukan' => ['required', 'string',  'max:255'],
            'jenis' => 'required|string|max:255',
            'synonime' => 'nullable|string|max:255',
            'famili' => 'nullable|string|max:255',
            'nomor_vak' => 'nullable|string|max:255',
            'nama_lokal' => 'nullable|string|max:255',
            'lokasi' => 'required|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        // Create the Tanaman entry
        Tanaman::create($validatedData);

        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil ditambahkan!');
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id): View
    {
        $tanaman = Tanaman::findOrFail($id);
        $pengeringan = Pengeringan::where('tanaman_id', $id)->get();
        $pembuatanBahanKoleksi = PembuatanBahanKoleksi::where('tanaman_id', $id)->get();
        $polatrapesium = Polatrapesium::where('tanaman_id', $id)->get();
        $pbtk = Pbtk::where('tanaman_id', $id)->get();
        $pnptk = Pnptk::where('tanaman_id', $id)->get();
        $dokumentasiKoleksi = DokumentasiKoleksi::where('tanaman_id', $id)->get();
        $anatomiMikroskopis = AnatomiMikroskopis::where('tanaman_id', $id)->get();
        $anatomiMakroskopis = AnatomiMakroskopis::where('tanaman_id', $id)->get();

        return view('tanaman.show', compact(
            'tanaman',
            'pengeringan',
            'pembuatanBahanKoleksi',
            'polatrapesium',
            'pbtk',
            'pnptk',
            'dokumentasiKoleksi',
            'anatomiMikroskopis',
            'anatomiMakroskopis'
        ));
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id): View
    {
        $tanaman = Tanaman::findOrFail($id);
        return view('tanaman.edit', compact('tanaman'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'jenis' => 'required|string|max:255',
            'synonime' => 'nullable|string|max:255',
            'famili' => 'nullable|string|max:255',
            'nomor_vak' => 'nullable|string|max:255',
            'nama_lokal' => 'nullable|string|max:255',
            'keterangan' => 'nullable|string',
        ]);

        $tanaman = Tanaman::findOrFail($id);
        $tanaman->update($validatedData);

        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil diperbarui!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $tanaman = Tanaman::findOrFail($id);
        $tanaman->delete();
        return redirect()->route('tanaman.index')->with('success', 'Tanaman berhasil dihapus!');
    }
}
