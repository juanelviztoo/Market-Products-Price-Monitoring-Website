<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PasarController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KomoditiController;
use App\Http\Controllers\RiwayatHargaKomoditiController;
use App\Http\Controllers\ProdukKomoditiController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\ProfileController;

Route::resource('pasar', PasarController::class);
Route::resource('kategori', KategoriController::class);
Route::resource('komoditi', KomoditiController::class);
Route::resource('riwayat_harga_komoditi', RiwayatHargaKomoditiController::class);
Route::resource('produk_komoditi', ProdukKomoditiController::class);
Route::resource('profile', ProfileController::class);

Route::get('/', [HomeController::class, 'index'])->name('home');
// Route::get('/profile', [ProfileController::class, 'index'])->name('profile');

// Route::get('/', function () {
//     return view('welcome');
// });
