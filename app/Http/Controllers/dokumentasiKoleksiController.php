<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\dokumentasiKoleksi;
use App\Models\tanaman;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\DokumentasiKoleksiExport;
use Carbon\Carbon;

class dokumentasiKoleksiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $dokumentasiKoleksi = dokumentasiKoleksi::with(['tanaman', 'User'])->get();
        return view('dokumentasiKoleksi.index', compact('dokumentasiKoleksi'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function export(){
        return Excel::download(new DokumentasiKoleksiExport, 'dokumentasi_koleksi'.Carbon::now()->format('d-m-y-H:i:s').'.xlsx');
    }
    public function create()
    {
        $tanamans = tanaman::all();
        return view('dokumentasiKoleksi.create', compact('tanamans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'foto_trapesium' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'foto_pola' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
            'tanaman_id' => 'required|exists:tanamen,id',
            'author_id' => 'required|exists:users,id',
            'keterangan' => 'nullable|string',
        ]);

        $trapesiumPath = null;
        $polaPath = null;

        if ($request->hasFile('foto_trapesium')) {
            $trapesiumPath = $request->file('foto_trapesium')->store('uploads/form9/foto/trapesium','public');
        }

        if ($request->hasFile('foto_pola')) {
            $polaPath = $request->file('foto_pola')->store('uploads/form9/foto/pola','public');
        }

        dokumentasiKoleksi::create([
            'tanaman_id' => $request->tanaman_id,
            'foto_pola' => json_encode($polaPath),
            'foto_trapesium' => json_encode($trapesiumPath),
            'keterangan' => $request->keterangan,
            'author_id' => $request->author_id,
        ]);

        return redirect()->route('dokumentasi-koleksi.index')->with('success', 'Data has been saved successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Implement if needed
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Implement if needed
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Implement if needed
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        // Implement if needed
    }
}
