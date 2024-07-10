<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\HistoryController;
use App\Http\Controllers\KasirController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// route root
// Route::get('/', function () {
//     return view('welcome');
// });
Route::get('/', [AuthController::class, 'index']);
// metode nya get lalu masukkan namespace AuthController
// attribute name merupakan penamaan dari route yang kita buat
// kita tinggal panggil fungsi route(name) pada layout atau controller
Route::get('login', [AuthController::class, 'index'])->name('login');
Route::post('proses_login', [AuthController::class, 'proses_login'])->name('proses_login');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['middleware' => ['auth']], function () {
    // Kasir
    Route::get('/kasir', [KasirController::class, 'index']);
    Route::group(['middleware' => ['cek_login:admin']], function () {
        // Produk
        Route::get('/produk', [ProdukController::class, 'index'])->name('produk.index');
        Route::get('/produk/tambah', [ProdukController::class, 'tambah']);
        Route::post('/produk/proses_tambah', [ProdukController::class, 'proses_tambah'])->name('produk.proses_tambah');
        Route::get('/produk/edit/{id}', [ProdukController::class, 'edit']);
        Route::post('/produk/proses_edit', [ProdukController::class, 'proses_edit'])->name('produk.proses_edit');
        Route::get('/produk/delete/{id}', [ProdukController::class, 'proses_delete'])->name('produk.proses_delete');
        // Users
        Route::get('/users', [UserController::class, 'index']);
        Route::get('/users/tambah', [UserController::class, 'tambah']);
        Route::post('/users/proses_tambah', [UserController::class, 'proses_tambah'])->name('users.proses_tambah');
        Route::get('/users/edit/{id}', [UserController::class, 'edit']);
        Route::post('/users/proses_edit', [UserController::class, 'proses_edit'])->name('users.proses_edit');
        Route::get('/users/delete/{id}', [UserController::class, 'proses_delete'])->name('users.proses_delete');
        // History
        Route::get('/history', [HistoryController::class, 'index']);
        Route::get('/history/detail/{id}', [HistoryController::class, 'detail']);
    });
});
