<?php

namespace App\Http\Controllers;

use App\Exports\inspeksiExport;
use App\Models\inspeksi;
use App\Models\tanaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class inspeksiController extends Controller
{
    public function export(){
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $now = Carbon::now();
        $formatDate = $now->format('d-m-Y-H:i:s');
        $inspeksi = inspeksi::with(['tanaman', 'User'])
                         ->whereMonth('created_at', $currentMonth)
                         ->whereYear('created_at', $currentYear)
                         ->get();
        return Excel::download(new inspeksiExport($inspeksi), 'inspeksi_'.$formatDate.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);

    }
    public function index()
    {
        $inspeksis = inspeksi::with(["tanaman", "User"])->get();
        return view("inspeksi.index", compact("inspeksis"));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::all();
        return view("inspeksi.create", compact("tanamans"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id',
            'identifikasi_koleksi' => 'required|string',
            "kondisi_koleksi" => 'required|string',
            "trapesium_koleksi"  => 'required|string',
            "trapesium_duplikat"  => 'required|string',
            "duplikasi_no_koleksi"  => 'required|string',
            "koleksi_serbuk" => 'required|string',
            "preparat_koleksi_sayatan" => 'required|string',
            "preparat_koleksi_serat" => 'required|string',
            "kubus" => 'required|string',
            "keterangan" => 'required|string',
            "author_id" => 'exists:users,id'
        ]);
        $inspeksis= inspeksi::create($validateData);

        return redirect()->route('inspeksi.index')->with('success', 'data ditambahkan');
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
