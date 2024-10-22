<?php

use App\Http\Controllers\api\chartdata;
use App\Http\Controllers\api\spesiesController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('species', [spesiesController::class, 'index']);
Route::get('species/search/{id?}', [spesiesController::class, 'getSearchNama']);
Route::post('species', [spesiesController::class, 'store']);
Route::put('species/{id}', [spesiesController::class, 'update']);
Route::delete('species/{id}', [spesiesController::class, 'destroy']);
Route::get('/spesies/{id?}', [SpesiesController::class, 'show']); 

Route::get('/penerimaan-tanaman', [chartdata::class, 'getPenerimaanTanaman']);
Route::get('/total-tanaman', [chartdata::class, 'getTotalTanaman']);
Route::get('/tanaman-penomoran', [chartdata::class, 'getTanamanPenomoran']);
