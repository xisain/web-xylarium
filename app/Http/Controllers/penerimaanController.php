<?php

namespace App\Http\Controllers;
use App\Exports\PenerimaanExport;
use Illuminate\Http\Request;
use Illuminate\View\View;
use App\Models\penerimaan;
use Maatwebsite\Excel\Facades\Excel;

class penerimaanController extends Controller
{
    
    public function export($withStatus)
    {
        $withStatus = $withStatus == 'with-status';
        $fileName = $withStatus ? 'penerimaan_with_status.xlsx' : 'penerimaan_without_status.xlsx';

        return Excel::download(new PenerimaanExport($withStatus), $fileName);
    }

    public function index()
    {
        $penerimaans = penerimaan::with('user')->orderBy('id')->paginate(15);
      return view('penerimaan.index', compact('penerimaans'));
        
    }
    /**
     * Show the form for creating a new resource.
     */
    public function create(): View
    {
        return view('penerimaan.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
        'nama_tanaman'=> 'required|string|max:255',
        'suku'=> 'required|string|max:255',
        'habitus'=> 'required|string|max:255',
        'tempat_asal'=> 'required|string|max:255',
        'tanggal_terima'=> 'required|date',
        'xylarium_log'  => 'required|string|max:255',
        'xylarium_lempengan'=> 'required|string|max:255',
        'jumlah_material'=> 'required|string|max:255',
        'Koordinat'=> 'required|string|max:255',
        'keterangan' => 'required|string|max:255',
        'status' => 'nullable|string|in:layak,tidak,belum di cek', 
        'author_id' => 'required|exists:users,id'
        ]);
        penerimaan::create($validatedData);
        return redirect()->route('penerimaan.index')->with('success', 'penerimaan berhasil ditambahkan!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $penerimaan = penerimaan::with('user')->findOrFail($id);
        return view('penerimaan.show', compact('penerimaan'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $penerimaan = penerimaan::findOrFail($id);
        return view('penerimaan.edit', compact('penerimaan'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $validatedData = $request->validate([
            'nama_tanaman'=> 'required|string|max:255',
            'suku'=> 'required|string|max:255',
            'habitus'=> 'required|string|max:255',
            'tempat_asal'=> 'required|string|max:255',
            'xylarium_log'  => 'required|string|max:255',
            'xylarium_lempengan'=> 'required|string|max:255',
            'jumlah_material'=> 'required|string|max:255',
            'Koordinat'=> 'required|string|max:255',
            'keterangan' => 'nullable|string|max:255',
            'status' => 'string|in:layak,tidak,belum di cek', 
            'author_id' => 'required|exists:users,id'
            ]);

    $penerimaan = penerimaan::findOrFail($id);
    $penerimaan->update($validatedData);

    return redirect()->route('penerimaan.index')->with('success', 'penerimaan berhasil update!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $penerimaan = penerimaan::findOrFail($id);
        $penerimaan->delete();
        return redirect()->route('penerimaan.index')->with('success','Data berhasil di hapus');
    }
}
