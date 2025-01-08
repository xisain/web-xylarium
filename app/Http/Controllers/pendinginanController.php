<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendinginan;
use App\Models\tanaman;
use Illuminate\Support\Carbon;
use App\Exports\pendinginganExport;
use Maatwebsite\Excel\Facades\Excel;


class pendinginanController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     public function export(){
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $now = Carbon::now();
        $formatDate = $now->format('d-m-Y-H:i:s');
        $pendinginan = pendinginan::with(['tanaman', 'User'])
                         ->whereMonth('created_at', $currentMonth)
                         ->whereYear('created_at', $currentYear)
                         ->get();
        return Excel::download(new pendinginganExport($pendinginan), 'pola_trapesium_'.$formatDate.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);

    }

    public function index()
    {
        $pendinginans = pendinginan::all();
        return view('pendinginan.index', compact('pendinginans'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::all();
        return view('pendinginan.create', compact('tanamans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'xylarium_bahan' => 'required|string',
            'xylarium_koleksi'=> 'required|string',
            'xylarium_duplikat' => 'required|string',
            'tanggal_masuk' => 'required|date',
            'tanggal_keluar' => 'required|date',
            'tanaman_id' => 'required|exists:tanamen,id',
            'author_id' => 'required|exists:users,id',
        ]);
        $pendinginan = pendinginan::create($validateData);
        return redirect()->route('pendinginan.index')->with('success', 'Data added successfully');
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
        //
    }
}
