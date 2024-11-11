<?php

namespace App\Http\Controllers;

use App\Models\pemeliharaan;
use App\Models\tanaman;
use App\Models\pendinginan;
use App\Models\pengeringan;
use Illuminate\Http\Request;

class pemeliharaanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pemeliharaans = pemeliharaan::with(['tanaman','user','pengeringan','pendinginan'])->get();
        return view("pemeliharaan.index", compact("pemeliharaans"));
    }
    public function getPengeringanByTanaman($tanaman_id)
    {
        $pengeringans = pengeringan::where('tanaman_id', $tanaman_id)->get();
        return response()->json($pengeringans);
    }

    public function getPendinginanByTanaman($tanaman_id)
    {
        $pendinginans = pendinginan::where('tanaman_id', $tanaman_id)->get();
        return response()->json($pendinginans);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::with(['pengeringan','pendinginan'])->get();

        return view('pemeliharaan.create', compact('tanamans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validateData = $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id',
            'pengeringan_id' => 'required|exists:pengeringans,id',
            'pendinginan_id' => 'required|exists:pendinginans,id',
            'tanggal_pest_control' => 'required|date',
            'tanggal_vacuum' => 'required|date',
            'tanggal_fumigasi' =>'required|date',
            'keterangan' => 'nullable|string',
            'author_id' => 'required|exists:users,id',
        ]);
        $pemeliharaan = pemeliharaan::create($validateData);
        return redirect()->route('pemeliharaan.index')->with('success', "data berhasil di tambahkan ");
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
