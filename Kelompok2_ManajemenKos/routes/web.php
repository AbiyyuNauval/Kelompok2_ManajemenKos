<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PemilikKosController; // <-- CONTROLLER BARU

Route::get('/home', [HomeController::class, 'index'])->name('home');

// Rute Publik
Route::get('/kos', [KosController::class, 'index']);
Route::get('/kos/detail/{id?}', [KosController::class, 'show']);
Route::get('/kamar', [KamarController::class, 'index']);
Route::get('/kamar/detail/{id?}', [KamarController::class, 'show']);
Route::get('/tiket', [TiketController::class, 'index']);

// Rute Autentikasi
Route::get('/home/login', [AuthController::class, 'showLogin'])->name('login');
Route::post('/home/login', [AuthController::class, 'login']);
Route::get('/home/signup', [AuthController::class, 'showSignup']);
Route::post('/home/signup', [AuthController::class, 'signup']);
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/pemilik/dashboard', [PemilikKosController::class, 'dashboard']);

// Rute Khusus Pemilik Kos (TIDAK TERPROTEKSI OLEH MIDDLEWARE DI SINI)
// Route::prefix('pemilik')->group(function () {

//     // Rute untuk dashboard utama pemilik kos
//     Route::get('/pemilik/dashboard', [PemilikKosController::class, 'dashboard'])->name('pemilik.dashboard');

    // Resource controller untuk manajemen kos (CRUD: index, create, store, edit, update, destroy)
    //  Route::resource('manajemen-kos', PemilikKosController::class)->except(['show']);
// });
