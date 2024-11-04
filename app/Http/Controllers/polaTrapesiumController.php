<?php

namespace App\Http\Controllers;

use App\Exports\polaTrapesiumExport;
use Illuminate\Http\Request;
use App\Models\tanaman;
use App\Models\polatrapesium;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class polaTrapesiumController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $polatrapesium = polatrapesium::with(['tanaman', 'User'])->get();
        return view('polatrapesium.index',compact('polatrapesium'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::all();
        return view('polatrapesium.create',compact('tanamans'));
    }

    public function export(){
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $now = Carbon::now();
        $formatDate = $now->format('d-m-Y-H:i:s');
        $polatrapesium = polatrapesium::with(['tanaman', 'User'])
                         ->whereMonth('tanggal', $currentMonth)
                         ->whereYear('tanggal', $currentYear)
                         ->get();
        dd($polatrapesium);
        // return Excel::download(new polaTrapesiumExport($polatrapesium), 'pola_trapesium_'.$formatDate.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //    dd($request->all());
       $validatedData = $request->validate([
        'tanggal' => 'required|date',
        'tanaman_id' => 'required|exists:tanamen,id',
        'user_id' => 'required|exists:users,id',
        'keterangan' => 'nullable|string',
        'terpola_trapesium' => 'required|string',
        'terpola_utuh' => 'required|string',
        'terpola_kubus' => 'required|string',
        'terpola_jumlah' => 'required|integer',
       ]);

       $polatrapesium = polatrapesium::create($validatedData);
       return redirect()->route('pola-trapesium.index')->with('success', 'Data added successfully');
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
        $find = polatrapesium::findOrFail($id);
        $find->delete();
        return redirect()->route('pola-trapesium.index')->with('success', 'data terhapus');
    }
}
