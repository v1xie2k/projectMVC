<?php

use App\Http\Controllers\CartController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomePageController;
use App\Http\Controllers\MasterController;
use App\Http\Controllers\MasterReportController;
use App\Http\Controllers\MasterUserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\MasterTopupController;
use App\Http\Controllers\transactionController;
use App\Http\Controllers\UserController;
use App\Http\Middleware\CheckLogin;
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
Route::get('/menu', [SiteController::class,'menu']);

Route::prefix('home')->group(function () {
    Route::get('/', [SiteController::class,'home']);

    Route::prefix('menu')->group(function () {
        Route::get('',[HomePageController::class,'home']);
        Route::get('{id}',[HomePageController::class,'listitems']);
        Route::get('addToCart/{id}',[HomePageController::class,'addToCart']);
    });

    Route::prefix('cart')->middleware([CheckLogin::class])->group(function () {
        Route::get('',[CartController::class,'home']);
        Route::post('increase/{id}',[CartController::class,'increaseCart']);
        Route::post('decrease/{id}',[CartController::class,'decreaseCart']);
        Route::post('deleteItem/{id}',[CartController::class,'deleteItem']);
        Route::post('buy/{id}',[CartController::class,'transaction']);
    });

    Route::prefix('user')->middleware([CheckLogin::class])->group(function () {
        Route::get('profile',[UserController::class,'profile']);
        Route::get('editprofile/{id}',[UserController::class,'editprofile']);
        Route::get('editpassword/{id}',[UserController::class,'editpassword']);
        // Route::post('docreate',[UserController::class,'docreate']);
        Route::post('doedit/{id}',[UserController::class,'doedit']);
        Route::post('doedit/password/{id}',[UserController::class,'doeditpassword']);
        // Route::get('delete/{id}',[UserController::class,'delete']);
        // Route::get('details/{id}',[UserController::class,'detail']);
        Route::get('history/trans',[UserController::class,'historyTrans']);
        Route::get('history/trans/detail/{id}',[UserController::class,'historyTransDetail']);
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
        Route::get('edit/{id}',[MenuController::class,'edit']);
        Route::post('doedit',[MenuController::class,'doedit']);
        Route::get('details/{id}',[MenuController::class,'detail']);
        Route::get('lprod',[MenuController::class,'lprod']);
    });

    Route::prefix('transaction')->group(function () {
        Route::get('',[transactionController::class,'home']);
        Route::get('ltrans',[transactionController::class,'ltrans']);
        Route::get('details/{id}',[transactionController::class,'detail']);

    });

    Route::prefix('category')->group(function () {
        Route::get('',[CategoryController::class,'home']);
        Route::post('docreate',[CategoryController::class,'docreate']);
        Route::post('doedit',[CategoryController::class,'doedit']);
        Route::get('delete/{id}',[CategoryController::class,'delete']);
        Route::get('details/{id}',[CategoryController::class,'detail']);
    });
    Route::prefix('user')->group(function () {
        Route::get('',[MasterUserController::class,'home']);
        Route::get('reset/{id}',[MasterUserController::class,'reset']);
        Route::get('delete/{id}',[MasterUserController::class,'delete']);
        Route::post('dosearch',[MasterUserController::class,'search']);
        // Route::get('sorting',[MasterUserController::class,'sort']);
    });
    Route::prefix('topup')->group(function () {
        Route::get('',[MasterTopupController::class,'home']);
        Route::get('history',[MasterTopupController::class,'home2']);
    });
    Route::prefix('report')->group(function () {
        Route::get('',[MasterReportController::class,'home']);
        Route::get('data',[MasterReportController::class,'data']);
        Route::post('filterDate',[MasterReportController::class,'filterDate']);
    });
});
