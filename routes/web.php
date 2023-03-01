<?php

use App\Http\Controllers\DaftarRuanganController;
use App\Http\Controllers\JenisBarangController;
use App\Http\Controllers\KondisiBarangController;
use App\Http\Controllers\DaftarBarangController;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin'], function () {
    Route::get('/', function () {
        return view('admin.index');
    });
// Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin']], function () {
//     Route::get('/', function () {
//     return view('admin.index');
//     });
    
        Route::resource('daftar_ruangan',DaftarRuanganController::class);
        Route::resource('jenis_barang',JenisBarangController::class);
        Route::resource('kondisi_barang',KondisiBarangController::class);
        Route::resource('daftar_barang',DaftarBarangController::class);

    });
    
  