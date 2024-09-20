<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pendinginan;
use App\Models\tanaman;


class pendinginanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pendinginans = Pendinginan::all();
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
        $pendinginan = Pendinginan::create($validateData);
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
