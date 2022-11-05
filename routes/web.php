<?php

use App\Http\Controllers\MasterController;
use App\Http\Controllers\SiteController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/login', [SiteController::class,'login']);
Route::post('/dologin', [SiteController::class,'dologin']);

Route::get('/home', [SiteController::class,'home']);

// Route::get('/admin',[MasterController::class,'home']); //localhost:8000/admin/
Route::prefix('admin')->middleware(['CheckRole:admin'])->group(function () {
    Route::get('/',[MasterController::class,'home']); //localhost:8000/admin/

    // Route::prefix('buku')->group(function () {
    //     Route::get('',[BukuController::class,'index']);// localhost:8000/admin/buku
    //     Route::get('tambah',[BukuController::class,'tambah']);
    //     Route::post('doTambah',[BukuController::class,'doTambah']);
    //     Route::get('ubah/{buku_id}',[BukuController::class,'ubah']); // admin/buku/ubah/79
    //     Route::post('doUbah',[BukuController::class,'doUbah']);
    //     Route::get('doHapus/{buku_id}',[BukuController::class,'doHapus']); //admin/buku/doHapus/79

    //     Route::get('datatables', [BukuController::class,'datatables']);
    // });
});
