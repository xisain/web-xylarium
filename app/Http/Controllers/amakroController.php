<?php

namespace App\Http\Controllers;

use App\Exports\AnatomiMakroskopisExport;
use Illuminate\Http\Request;
use App\Models\anatomiMakroskopis;
use App\Models\tanaman;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
    public function pdfExport()
    {
        $currentMonth = Carbon::now()->month;
        $currentYear = Carbon::now()->year;
        $now = Carbon::now();

        // Ambil data dari database
        $amakro = anatomiMakroskopis::with('tanaman', 'User')
            ->whereMonth('created_at', $currentMonth)
            ->whereYear('created_at', $currentYear)
            ->get();

        // Render ke PDF
        $pdf = Pdf::loadView('pdf.amakro', compact('amakro'))
            ->setPaper('a4', 'landscape'); // Atur ukuran kertas ke A4 dan orientasi landscape

        // Unduh file PDF
        return $pdf->download('anatomi_makroskopis_' .$now. '.pdf');
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
        // Find the anatomi makroskopis record by ID
        $record = anatomiMakroskopis::findOrFail($id);

        // Decode JSON paths for images
        $radialImages = json_decode($record->radial_images);
        $tangenImages = json_decode($record->tangen_images);
        $transversalImages = json_decode($record->transversal_images);

        // Delete radial images if they exist
        if ($radialImages) {
            foreach ($radialImages as $path) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        // Delete tangen images if they exist
        if ($tangenImages) {
            foreach ($tangenImages as $path) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        // Delete transversal images if they exist
        if ($transversalImages) {
            foreach ($transversalImages as $path) {
                if (Storage::disk('public')->exists($path)) {
                    Storage::disk('public')->delete($path);
                }
            }
        }

        // Delete the anatomi makroskopis record
        $record->delete();

        // Redirect with success message
        return redirect()->route('anatomi-makroskopis.index')->with('success', 'Data terhapus');
    }
}
