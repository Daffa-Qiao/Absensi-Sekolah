<?php

use App\Http\Controllers\KelasController;
use Illuminate\Support\Facades\Route;

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
    return view('admin.kelas');
});

Route::prefix('admin')->group(function () {
    Route::prefix('kelas')->group(function () {
        Route::get('/',[KelasController::class,'index'])->name('kelas.index');
        Route::post('/', [KelasController::class, 'store'])->name('kelas.store');
        Route::put('/update/{kode_kelas}', [KelasController::class, 'update'])->name('kelas.update');
        Route::delete('/hapus/{kode_kelas}',[KelasController::class,'hapus'])->name('kelas.hapus');
    });  
});
