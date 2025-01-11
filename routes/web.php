<?php

use App\Http\Controllers\amakroController;
use App\Http\Controllers\pemeliharaanController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});


Auth::routes();
Route::get('/getout', function () {
    Auth::logout();
    return redirect('/');
});

Route::group(['middleware' => 'auth'], function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/penerimaan/export/{withStatus}', [\App\Http\Controllers\penerimaanController::class, 'export'])->name('penerimaan.export');

    // Route Setiap Formulir & sudah selesai
    Route::resource('/tanaman', App\Http\Controllers\tanamanController::class); // 0
    Route::resource('/penerimaan', \App\Http\Controllers\penerimaanController::class); // 1 & 2
    Route::resource('/penomorankoleksi', App\Http\Controllers\penomoranKoleksiController::class);// 3
    Route::resource('/pengeringan', App\Http\Controllers\pengeringanController::class); // 4
    Route::resource('/pembuatan-bahan-koleksi', App\Http\Controllers\pembuatanBahanKoleksiController::class); // 5
    Route::resource('/pola-trapesium', App\Http\Controllers\polaTrapesiumController::class); // 6
    Route::resource('/pbtk', App\Http\Controllers\pbtkController::class); // 7
    Route::resource('/pnptk', App\Http\Controllers\pnptkController::class); // 8
    Route::resource('/dokumentasi-koleksi', App\Http\Controllers\dokumentasiKoleksiController::class); // 9
    Route::resource('/anatomi-makroskopis', App\Http\Controllers\amakroController::class); // 10
    Route::resource('/anatomi-mikroskopis', App\Http\Controllers\amikroController::class); // 11
    Route::resource('/pendinginan', App\Http\Controllers\pendinginanController::class); // 12
    Route::resource('/penyimpanan', App\Http\Controllers\penyimpananController::class); // 13
    Route::resource('/inspeksi', App\Http\Controllers\inspeksiController::class); // 14
    Route::resource('/pemeliharaan', App\Http\Controllers\pemeliharaanController::class); // 15
    // Dalam Pengerjaan

    // Define routes to fetch pengeringan and pendinginan records
    Route::get('/getPengeringan/{tanaman_id}', [App\Http\Controllers\pemeliharaanController::class, 'getPengeringanByTanaman']);
    Route::get('/getPendinginan/{tanaman_id}', [App\Http\Controllers\pemeliharaanController::class, 'getPendinginanByTanaman']);


    // Export
    Route::get('penerimaan/export/{withStatus}', [App\Http\Controllers\penerimaanController::class, 'export'])->name('penerimaan.export'); // Formulir 1 dan 2 Dengan status atau tidak
    Route::get('penomorankoleksi-export', [App\Http\Controllers\penomoranKoleksiController::class, 'export'])->name('penomoran.export'); // Formulir 3
    Route::get('/pengeringan-export', [App\Http\Controllers\pengeringanController::class,'export'])->name('pengeringan.export'); // Formulir 4
    Route::get('/pembuatan-bahan-koleksi-export', [App\Http\Controllers\pembuatanBahanKoleksiController::class,'export'])->name('pembuatan-bahan-koleksi.export'); // formulir 5
    Route::get('/pola-trapesium-export', [App\Http\Controllers\polaTrapesiumController::class,'export'])->name('pola-trapesium.export');// Formulir 6
    Route::get('/pbtk-export', [App\Http\Controllers\pbtkController::class,'export'])->name('pbtk.export');// Formulir 7
    Route::get('/pnptk-export', [App\Http\Controllers\pnptkController::class,'export'])->name('pnptk.export'); //Formulir 8
    Route::get('/pendinginan-export', [App\Http\Controllers\pendinginanController::class,'export'])->name('pendinginan.export'); //Formulir 8
    Route::get('/inspeksi-export', [App\Http\Controllers\inspeksiController::class,'export'])->name('inspeksi.export'); //Formulir 8
    Route::get('/peyimpanan-export', [App\Http\Controllers\penyimpananController::class,'export'])->name('penyimpanan.export'); //Formulir 8
    Route::get('/dokumentasi-koleksi-export', [App\Http\Controllers\dokumentasiKoleksiController::class,'export'])->name('dokumentasi-koleksi.export'); // formulir 9
    Route::get('/export-anatomi-makroskopis', [amakroController::class, 'export'])->name('anatomi-makroskopis.export'); // form 10
    Route::get('/pemeliharaan-export', [pemeliharaanController::class, 'export'])->name('pemeliharaan.export'); // form 10

    // PDF
    Route::get('/dokumentasi-koleksi-pdf', [App\Http\Controllers\dokumentasiKoleksiController::class, 'pdfExport'])->name('dokumentasi-koleksi.pdf');
    Route::get('/amakro-pdf', [App\Http\Controllers\amakroController::class, 'pdfExport'])->name('anatomi-makroskopis.pdf');
    Route::get('/amikro-pdf', [App\Http\Controllers\amikroController::class, 'pdfExport'])->name('anatomi-mikroskopis.pdf');
});
