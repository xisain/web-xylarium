<?php

namespace App\Http\Controllers;

use App\Models\anatomiMikroskopis;
use App\Models\tanaman;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class amikroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //

        $amikro = anatomiMikroskopis::with(['tanaman', 'User'])->get();
        return view('amikro.index', compact('amikro'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::all();
        return view('amikro.create', compact('tanamans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());

        $validatedData = $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id',
            'kegiatan_sayatan_tangen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kegiatan_sayatan_radial' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kegiatan_sayatan_transversal' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kegiatan_serat_panjang' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kegiatan_serat_diameter' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kegiatan_serat_diameterLumen' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kegiatan_serat_dindingSerat' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kegiatan_serat_diameterPembuluh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'kegiatan_serat_panjangPembuluh' => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'nullable|string',
            'author_id' => 'required|exists:users,id'
        ]);

        // Store each image in its respective folder
        if ($request->hasFile('kegiatan_sayatan_tangen')) {
            $path = $request->file('kegiatan_sayatan_tangen')->store('uploads/form11/kegiatan/sayatan/tangen', 'public');
            $validatedData['kegiatan_sayatan_tangen'] = $path;
        }

        if ($request->hasFile('kegiatan_sayatan_radial')) {
            $path = $request->file('kegiatan_sayatan_radial')->store('uploads/form11/kegiatan/sayatan/radial', 'public');
            $validatedData['kegiatan_sayatan_radial'] = $path;
        }

        if ($request->hasFile('kegiatan_sayatan_transversal')) {
            $path = $request->file('kegiatan_sayatan_transversal')->store('uploads/form11/kegiatan/sayatan/transversal', 'public');
            $validatedData['kegiatan_sayatan_transversal'] = $path;
        }

        if ($request->hasFile('kegiatan_serat_panjang')) {
            $path = $request->file('kegiatan_serat_panjang')->store('uploads/form11/kegiatan/serat/panjang', 'public');
            $validatedData['kegiatan_serat_panjang'] = $path;
        }

        if ($request->hasFile('kegiatan_serat_diameter')) {
            $path = $request->file('kegiatan_serat_diameter')->store('uploads/form11/kegiatan/serat/diameter', 'public');
            $validatedData['kegiatan_serat_diameter'] = $path;
        }

        if ($request->hasFile('kegiatan_serat_diameterLumen')) {
            $path = $request->file('kegiatan_serat_diameterLumen')->store('uploads/form11/kegiatan/serat/diameterLumen', 'public');
            $validatedData['kegiatan_serat_diameterLumen'] = $path;
        }

        if ($request->hasFile('kegiatan_serat_dindingSerat')) {
            $path = $request->file('kegiatan_serat_dindingSerat')->store('uploads/form11/kegiatan/serat/dindingSerat', 'public');
            $validatedData['kegiatan_serat_dindingSerat'] = $path;
        }

        if ($request->hasFile('kegiatan_serat_diameterPembuluh')) {
            $path = $request->file('kegiatan_serat_diameterPembuluh')->store('uploads/form11/kegiatan/serat/diameterPembuluh', 'public');
            $validatedData['kegiatan_serat_diameterPembuluh'] = $path;
        }

        if ($request->hasFile('kegiatan_serat_panjangPembuluh')) {
            $path = $request->file('kegiatan_serat_panjangPembuluh')->store('uploads/form11/kegiatan/serat/panjangPembuluh', 'public');
            $validatedData['kegiatan_serat_panjangPembuluh'] = $path;
        }

        // Save the data to the database
        $anatomiMikroskopis = anatomiMikroskopis::create($validatedData);

        return redirect()->route('anatomi-mikroskopis.index')->with('success', 'Data has been saved successfully.');
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
        $anatomiMikroskopis = anatomiMikroskopis::findOrFail($id);

    // Decode JSON paths for images (if they were stored as JSON)
    $kegiatanSayatanTangen = json_decode($anatomiMikroskopis->kegiatan_sayatan_tangen);
    $kegiatanSayatanRadial = json_decode($anatomiMikroskopis->kegiatan_sayatan_radial);
    $kegiatanSayatanTransversal = json_decode($anatomiMikroskopis->kegiatan_sayatan_transversal);
    $kegiatanSeratPanjang = json_decode($anatomiMikroskopis->kegiatan_serat_panjang);
    $kegiatanSeratDiameter = json_decode($anatomiMikroskopis->kegiatan_serat_diameter);
    $kegiatanSeratDiameterLumen = json_decode($anatomiMikroskopis->kegiatan_serat_diameterLumen);
    $kegiatanSeratDindingSerat = json_decode($anatomiMikroskopis->kegiatan_serat_dindingSerat);
    $kegiatanSeratDiameterPembuluh = json_decode($anatomiMikroskopis->kegiatan_serat_diameterPembuluh);
    $kegiatanSeratPanjangPembuluh = json_decode($anatomiMikroskopis->kegiatan_serat_panjangPembuluh);

    // Create an array of all image paths to delete
    $imagePaths = array_merge(
        (array)$kegiatanSayatanTangen,
        (array)$kegiatanSayatanRadial,
        (array)$kegiatanSayatanTransversal,
        (array)$kegiatanSeratPanjang,
        (array)$kegiatanSeratDiameter,
        (array)$kegiatanSeratDiameterLumen,
        (array)$kegiatanSeratDindingSerat,
        (array)$kegiatanSeratDiameterPembuluh,
        (array)$kegiatanSeratPanjangPembuluh
    );

    // Delete images if they exist
    foreach ($imagePaths as $path) {
        if (Storage::disk('public')->exists($path)) {
            Storage::disk('public')->delete($path);
        }
    }

    // Delete the anatomi mikroskopis record
    $anatomiMikroskopis->delete();

    // Redirect with success message
    return redirect()->route('anatomi-mikroskopis.index')->with('success', 'Data has been deleted successfully.');
    }
}
