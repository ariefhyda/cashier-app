<?php

use App\Http\Controllers\CobaController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});
// Route::get('halo', function () {
// 	return "Halo, saya Arif";
// });
// Route::get('coba', function () {
// 	return view('coba');
// });

// Produk
Route::get('/produk', [ProdukController::class,'index']);
Route::get('/produk/tambah', [ProdukController::class,'tambah']);
Route::get('/produk/edit/{id}', [ProdukController::class,'edit']);

// Users
Route::get('/users', [UserController::class,'index']);
Route::get('/users/tambah', [UserController::class,'tambah']);
Route::get('/users/edit/{id}', [UserController::class,'edit']);

// History
Route::get('/history', [HistoryController::class,'index']);
Route::get('/history/detail/{id}', [HistoryController::class,'detail']);

// KAsir
Route::get('/kasir', [KasirController::class,'index']);
