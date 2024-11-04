<?php

namespace App\Http\Controllers;

use App\Exports\pembuatanBahanKoleksiExport;
use Illuminate\Http\Request;
use App\Models\pembuatanBahanKoleksi;
use App\Models\tanaman;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\View\View;
use Maatwebsite\Excel\Facades\Excel;

class pembuatanBahanKoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): View
    {
        $pembuatanBahanKoleksi = PembuatanBahanKoleksi::with(['tanaman', 'User'])->get();
        return view('pembuatanBahanKoleksi.index', compact('pembuatanBahanKoleksi'));
    }
    public function export(){
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $now = Carbon::now();
        $formatdate = $now->format('d-m-Y-H:i:s');
        $pembuatanBahanKoleksi = pembuatanBahanKoleksi::with(['tanaman','User'])->whereMonth("tanggal",$currentMonth)->whereYear('tanggal',$currentYear)->get();
        return Excel::download(new pembuatanBahanKoleksiExport($pembuatanBahanKoleksi),'pembuatan-bahan-koleksi-'.$formatdate.'.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanaman = tanaman::all();
        return view('pembuatanBahanKoleksi.create', compact("tanaman"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'tanaman_id' => 'required|exists:tanamen,id',
            'kegiatan_gergaji'=> 'required|integer',
            'kegiatan_hamplas'=> 'required|integer',
            'jumlah_potongan'=> 'required|integer',
            'user_id' => 'required|exists:users,id',
            'keterangan' => 'nullable|string',

        ]);
        $pembuatanBahanKoleksi = pembuatanBahanKoleksi::create($validatedData);
        return redirect()->route('pembuatan-bahan-koleksi.index')->with('success', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $search = pembuatanBahanKoleksi::findOrFail($id);
        $search->delete();
        return redirect()->route('pembuatan-bahan-koleksi.index')->with('success','Data berhasil di hapus');
    }
}
