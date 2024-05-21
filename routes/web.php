<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\CobaController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::get('/', [AuthController::class, 'index']);

// metode nya get lalu masukkan namespace AuthController
// attribute name merupakan penamaan dari route yang kita buat
// kita tinggal panggil fungsi route(name) pada layout atau controller
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');
Route::get('forgot_password', [AuthController::class, 'forgot_password'])->name('forgot_password');
Route::post('proses_forgot_password', [AuthController::class, 'proses_forgot_password'])->name('proses_forgot_password');
Route::get('mail', [AuthController::class, 'sendMail']);

Route::group(['middleware' => ['auth']], function () {

    // KAsir
    Route::get('/kasir', [KasirController::class, 'index']);

    Route::group(['middleware' => ['cek_login:admin']], function () {
        // Produk
        Route::get('/produk', [ProdukController::class, 'index']);
        Route::get('/produk/tambah', [ProdukController::class, 'tambah']);
        Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);

        // Users
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/tambah', [UserController::class, 'tambah']);
        Route::get('/users/edit/{id}', [UserController::class, 'edit']);

        // History
        Route::get('/history', [HistoryController::class, 'index']);
        Route::get('/history/detail/{id}', [HistoryController::class, 'detail']);
    });
});
