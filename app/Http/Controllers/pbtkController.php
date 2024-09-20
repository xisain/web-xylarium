<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\tanaman;
use App\Models\pbtk;

use App\Exports\PbtkExport;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;

class pbtkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pbtks = pbtk::with(['tanaman', 'User'])->get();
        return view('pbtk.index',compact('pbtks'));
    }
    public function export() 
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $now = Carbon::now();
        $formatdate = $now->format('d-m-Y-H:i:s');
        $pbtks = pbtk::with(['tanaman','User'])->whereMonth('tanggal',$currentMonth)->whereYear('tanggal',$currentYear)->get();
       return Excel::download(new pbtkExport($pbtks),'pembuatan_bahan_trapesium_koleksi'.$formatdate.'.xlsx');
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::all();
        return view('pbtk.create',compact('tanamans'));
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
            'user_id' => 'required|exists:users,id',
            'kegiatan_gergaji_trapesium'=> 'required|string',
            'kegiatan_gergaji_utuh'=> 'required|string',
            'kegiatan_hamplas_trapesium'=> 'required|string',
            'kegiatan_hamplas_utuh'=> 'required|string',
            'kegiatan_kubus' => 'required|string',
            'jumlah_potongan' => 'required|string',
            'keterangan' => 'nullable|string',
        ]);
        $pbtk = pbtk::create($validatedData);
        return redirect()->route('pbtk.index')->with('success', 'Data added successfully');
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
