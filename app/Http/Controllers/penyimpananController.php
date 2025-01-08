<?php

namespace App\Http\Controllers;

use App\Exports\tersimpanExport;
use Illuminate\Http\Request;
use App\Models\penyimpanan;
use App\Models\tanaman;
use Carbon\Carbon;
use Maatwebsite\Excel\Facades\Excel;



class penyimpananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penyimpanans =penyimpanan::with('tanaman', 'User')->get();
        return view("penyimpanan.index", compact("penyimpanans"));
    }
    public function export(){
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $now = Carbon::now();
        $formatDate = $now->format('d-m-Y-H:i:s');
        $penyimpanan = penyimpanan::with(['tanaman', 'User'])
                         ->whereMonth('created_at', $currentMonth)
                         ->whereYear('created_at', $currentYear)
                         ->get();
        return Excel::download(new tersimpanExport($penyimpanan), 'penyimpanan_'.$formatDate.'.xlsx', \Maatwebsite\Excel\Excel::XLSX);

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::all();
        return view("penyimpanan.create", compact("tanamans"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
{
    // dd($request->all());
    $validatedData = $request->validate([
        'tanaman_id' => 'required|exists:tanamen,id',
        'tersimpan_koleksi_trapesium' => 'required|string|max:255',
        'tersimpan_koleksi_utuh' => 'required|integer',
        'tersimpan_koleksi_dekatKulit' => 'required|integer',
        'tersimpan_koleksi_potongan' => 'required|integer',
        'tersimpan_koleksi_preparat_sayatan' => 'required',
        'tersimpan_koleksi_preparat_serat' => 'required',
        'tersimpan_koleksi_kubus' => 'required|integer',
        'tersimpan_koleksi_serbuk' => 'required',
        'tersimpan_duplikat_trapesium' => 'required|string|max:255',
        'tersimpan_duplikat_utuh' => 'required|integer',
        'tersimpan_duplikat_dekatKulit' => 'required|integer',
        'tersimpan_duplikat_potongan' => 'required|integer',
        'keterangan' => 'nullable|string|max:1000',
        'author_id' => 'required|exists:users,id',
    ]);

    // Convert 'on' to true and anything else to false for boolean fields
    $booleanFields = [
        'tersimpan_koleksi_preparat_sayatan',
        'tersimpan_koleksi_preparat_serat',
        'tersimpan_koleksi_serbuk'
    ];

    foreach ($booleanFields as $field) {
        if (isset($validatedData[$field])) {
            $validatedData[$field] = $validatedData[$field] === 'on' ? true : false;
        } else {
            $validatedData[$field] = false;
        }
    }

    // Create a new record in the penyimpanans table
    $penyimpanan = penyimpanan::create($validatedData);

    // Redirect back to the index page with a success message
    return redirect()->route('penyimpanan.index')->with('success', 'Data penyimpanan berhasil disimpan.');

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
