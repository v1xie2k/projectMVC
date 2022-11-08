<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\UserController;
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
Route::get('/register', [SiteController::class,'register']);
Route::post('/doregister', [SiteController::class,'doregister']);
Route::post('/dologout', [SiteController::class,'dologout']);
Route::get('/dologout', [SiteController::class,'dologout']);

Route::prefix('home')->group(function () {
    Route::get('/', [SiteController::class,'home']);

    Route::prefix('menu')->group(function () {
        Route::get('',[HomePageController::class,'home']);
        Route::get('{id}',[HomePageController::class,'listitems']);
    });
    Route::prefix('user')->group(function () {
        Route::get('profile/{id}',[UserController::class,'profile']);
        Route::get('editprofile/{id}',[UserController::class,'editprofile']);
        Route::get('editpassword/{id}',[UserController::class,'editpassword']);
        // Route::post('docreate',[UserController::class,'docreate']);
        Route::post('doedit/{id}',[UserController::class,'doedit']);
        Route::post('doedit/password/{id}',[UserController::class,'doeditpassword']);
        // Route::get('delete/{id}',[UserController::class,'delete']);
        // Route::get('details/{id}',[UserController::class,'detail']);
    });
});

// Route::get('/admin',[MasterController::class,'home']); //localhost:8000/admin/
Route::prefix('admin')->middleware(['CheckRole:admin'])->group(function () {
    Route::get('/',[MasterController::class,'home']); //localhost:8000/admin/

    Route::prefix('menu')->group(function () {
        Route::get('',[MenuController::class,'home']);
        Route::post('docreate',[MenuController::class,'docreate']);
        Route::post('doedit',[MenuController::class,'doedit']);
        Route::get('delete/{id}',[MenuController::class,'delete']);
        Route::get('details/{id}',[MenuController::class,'detail']);
        Route::get('lprod',[MenuController::class,'lprod']);
    });
    Route::prefix('category')->group(function () {
        Route::get('',[CategoryController::class,'home']);
        Route::post('docreate',[CategoryController::class,'docreate']);
        Route::post('doedit',[CategoryController::class,'doedit']);
        Route::get('delete/{id}',[CategoryController::class,'delete']);
        Route::get('details/{id}',[CategoryController::class,'detail']);
    });
});
