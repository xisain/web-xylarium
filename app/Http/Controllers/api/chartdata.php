<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class chartdata extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
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

    /**
     * Get the count of penerimaan tanaman.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getPenerimaanTanaman()
    {
        $count = DB::table('xylarium.penerimaans')->count();
        return response()->json(['count' => $count]);
    }

    /**
     * Get the total count of tanaman.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTotalTanaman()
    {
        $count = DB::table('xylarium.tanamen')->count();
        return response()->json(['count' => $count]);
    }

    /**
     * Get the count of tanaman that have been numbered.
     *
     * @return \Illuminate\Http\JsonResponse
     */
    public function getTanamanPenomoran()
    {
        // Assuming 'tanaman_id' is the common column in both tables
        $count = DB::table('xylarium.penerimaans')
                    ->join('xylarium.penomoran_koleksis', 'xylarium.penerimaans.id', '=', 'xylarium.penomoran_koleksis.penerimaan_id') // Use the correct column names
                    ->distinct('xylarium.penerimaans.id') // Count distinct tanaman IDs
                    ->count('xylarium.penerimaans.id');

        return response()->json(['count' => $count]);
    }

}
