<?php

namespace App\Http\Controllers;

use App\Exports\AnatomiMakroskopisExport;
use Illuminate\Http\Request;
use App\Models\anatomiMakroskopis;
use App\Models\tanaman;
use Maatwebsite\Excel\Facades\Excel;

class amakroController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $amakro = anatomiMakroskopis::with(['tanaman', 'User'])->get();
        return view('amakro.index', compact('amakro'));
    }

    public function export()
    {
        $amakro = anatomiMakroskopis::with('tanaman', 'User')->get();
        return Excel::download(new AnatomiMakroskopisExport($amakro), 'anatomiMakroskopis.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tanamans = tanaman::all();
        return view('amakro.create', compact('tanamans'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $validatedData = $request->validate([
            'tanaman_id' => 'required|exists:tanamen,id',
            'radial_images.*' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'tangen_images.*' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'transversal_images.*' =>  'image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'keterangan' => 'nullable|string',
            'author_id' => 'required|exists:users,id'
        ]);
        $radialImages = $this->uploadImages($request->file('radial_images'), 'radial');
        $tangenImages = $this->uploadImages($request->file('tangen_images'), 'tangen');
        $transversalImages = $this->uploadImages($request->file('transversal_images'), 'transversal');
        anatomiMakroskopis::create([
            'tanaman_id' => $request->tanaman_id,
            'radial_images' => json_encode($radialImages),
            'tangen_images' => json_encode($tangenImages),
            'transversal_images' => json_encode($transversalImages),
            'keterangan' => $request->keterangan,
            'author_id' => $request->author_id
        ]);
        return redirect()->route('anatomi-makroskopis.index')->with('success', 'data ditambahkan');
    }
    private function uploadImages($images, String $name)
    {
        $imagePaths = []; // Pastikan untuk inisialisasi array ini.

        if ($images) {
            foreach ($images as $image) {
                $imagePaths[] = $image->store('uploads/form10/' . $name, 'public'); // Simpan setiap jalur gambar ke dalam array.
            }
        }

        return $imagePaths; // Kembalikan array dari jalur gambar yang diunggah.
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
