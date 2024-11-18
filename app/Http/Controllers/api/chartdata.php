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
    public function getFamiliCounts()
{
    $familiCounts = DB::table('tanamen')
        ->select('famili', DB::raw('count(*) as count_per_famili'))
        ->groupBy('famili')
        ->orderBy('count_per_famili','desc')
        ->get()
        ->map(function ($item) {
            if (empty($item->famili)) {
                $item->famili = 'species dubius';
            }
            return $item;
        });

    return response()->json($familiCounts, 200);
}
public function getCountPenerimaanDanKoleksi()
{
    // Get counts for penerimaan entries with status 'belum di cek', 'layak', and 'tidak layak'
    $counts = DB::table('penerimaans')
        ->leftJoin('tanamen', 'penerimaans.nama_tanaman', '=', 'tanamen.jenis')
        ->select(
            DB::raw('sum(case when penerimaans.status = "belum di cek" then 1 else 0 end) as belum_cek'),
            DB::raw('sum(case when penerimaans.status = "layak" then 1 else 0 end) as layak'),
            DB::raw('sum(case when penerimaans.status = "tidak" then 1 else 0 end) as tidak_layak')
        )
        ->get();

    return response()->json($counts, 200);
}



}
