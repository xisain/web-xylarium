<?php

namespace App\Http\Controllers;

use App\Models\pnptk;
use App\Models\tanaman;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\pnptkExport;

class pnptkController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pnptks = pnptk::with(['tanaman', 'User'])->get();
        return view("pnptk.index", compact("pnptks"));
    }
    public function export(){
        $currentYear = Carbon::now()->year;
        $currentMonth = Carbon::now()->month;


        $pnptk = pnptk::with(["tanaman","User"])
        ->whereMonth('created_at', $currentMonth)
        ->whereYear('created_at', $currentYear)
        ->get();
        return Excel::download(new pnptkExport($pnptk), 'pengetokan_nomor.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::all();
        return view("pnptk.create", compact("tanamans"));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            "tanaman_id" => "required|exists:tanamen,id",
            "xylarium_trapesium" => "required|string",
            "xylarium_utuh" => "required|string",
            "xylarium_serbuk"=> "required|string",
            "xylarium_dekatKulit" => "required|string",
            "xylarium_prepat_sayatan" => "required|string",
            "xylarium_prepat_serat" => "required|string",
            "xylarium_potongan" => "required|string",
            "author_id" => "required|exists:users,id",
            "keterangan" => 'nullable|string',
        ]);
        $pnptk = Pnptk::create($validateData);
        return redirect()->route('pnptk.index')->with('success','');
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
        $find = pnptk::findOrFail($id);
        $find->delete();
        return redirect()->route('pnptk.index')->with('success','data terhapus');
    }
}
