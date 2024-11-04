<?php

namespace App\Http\Controllers;

use App\Exports\pengeringanExport;
use App\Models\penerimaan;
use Illuminate\Http\Request;
use App\Models\pengeringan;
use App\Models\tanaman;
use Maatwebsite\Excel\Facades\Excel;
use Carbon\Carbon;

class pengeringanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pengeringan = pengeringan::with(['tanaman', 'User'])->get();
        return view('pengeringan.index',compact('pengeringan'));
    }

    public function export(){
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $now = Carbon::now();
        $formatdate = $now->format('d-m-Y-H:i:s');
        $pengeringan = pengeringan::with(['tanaman', 'User'])
            ->whereMonth('tanggal_masuk', $currentMonth)
            ->whereYear('tanggal_masuk', $currentYear)
            ->get();

        return Excel::download(new pengeringanExport($pengeringan), 'pengeringan-'.$formatdate.'.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanaman = Tanaman::all();
        return view('pengeringan.create', compact('tanaman'));
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'tanaman_id' => 'required|exists:tanamen,id',
            'user_id' => 'required|exists:users,id',
            'keterangan' => 'nullable|string',

        ]);

        pengeringan::create($validatedData);
        return redirect()->route('pengeringan.index')->with('success', 'Data berhasil ditambahkan');
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
        $kering = pengeringan::findOrFail($id);
        $kering->delete();
        return redirect()->route('pengeringan.index')->with('success', 'Data berhasil di hapus');
    }
}
