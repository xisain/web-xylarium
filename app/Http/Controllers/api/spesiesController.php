<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\species;
use App\Http\Resources\speciesRes;
use Carbon\Carbon;

class SpesiesController extends Controller
{
   // Get all species
   public function index()
   {
       $species =  Species::all();
       $count = $species->count();
       return new speciesRes(true,$count ,'list tanaman', $species, Carbon::now());
   }

   // Store new species
   public function store(Request $request)
   {
       $validatedData = $request->validate([
           'nama' => 'required|string',
           'genera' => 'required|string',
           'spesies' => 'required|string',
           'author_name' => 'required|string',
           'infra_rank_species' => 'nullable|string',
           'infra_rank_ephitet' => 'nullable|string',
           'infra_rank_author' => 'nullable|string',
           'margajenis' => 'required|string',
           'jenis' => 'required|string',
           'taxon_rank' => 'required|string',
       ]);

       $species = Species::create($validatedData);

       return response()->json($species, 201);
   }

   // Show single species by ID
   public function show($id)
   {
    $species = species::find($id);

    if (!$species) {
        return response()->json(['message' => 'Species not found'], 404);
    }

    return response()->json($species);
}


   // Search species by name and genera
   public function getSearchNama(Request $request)
{
    // Get the 'nama' parameter from the query string
    $nama = $request->query('nama');

    // Build the query for the 'species' model
    $query = species::query();

    // Add filter for 'nama'
    if ($nama) {
        $query->where('nama', 'LIKE', '%' . $nama . '%');
    }

    // You can add other filters here if needed
    // For example: $query->where('suku', 'LIKE', '%' . $request->query('suku') . '%');

    // Execute the query and get the results
    $species = $query->get();

    // Check if there are any results
    if ($species->isEmpty()) {
        return response()->json(['message' => 'No matching species found'], 404);
    }

    // Get the count of results from the species collection
    $countdata = $species->count();

    // Return the response using the speciesRes resource or a JSON response
    return new speciesRes(true, $countdata, 'list tanaman dengan nama ' . $nama, $species, Carbon::now());
}


   // Update species
   public function update(Request $request, $id)
   {
       $species = species::findOrFail($id);

       $validatedData = $request->validate([
           'nama' => 'sometimes|required|string',
           'genera' => 'sometimes|required|string',
           'spesies' => 'sometimes|required|string',
           'author_name' => 'sometimes|required|string',
           'infra_rank_species' => 'nullable|string',
           'infra_rank_ephitet' => 'nullable|string',
           'infra_rank_author' => 'nullable|string',
           'margajenis' => 'sometimes|required|string',
           'jenis' => 'sometimes|required|string',
           'taxon_rank' => 'sometimes|required|string',
       ]);

       $species->update($validatedData);

       return response()->json($species);
   }

   // Delete species
   public function destroy($id)
   {
       $species = species::findOrFail($id);
       $species->delete();

       return response()->json(null, 204);
   }
}
