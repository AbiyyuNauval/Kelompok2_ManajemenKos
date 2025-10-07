<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AuthController;

Route::get('/home', [HomeController::class, 'index']);

Route::get('/kos', [KosController::class, 'index']);

Route::get('/kos/create', [KosController::class, 'create']);

Route::get('/kos/detail/{id?}', [KosController::class, 'show']);

Route::get('/kos/detail/{id}/edit', [KosController::class, 'edit']);

Route::get('/kamar', [KamarController::class, 'index']);

Route::get('/kamar/detail/{id?}', [KamarController::class, 'show']);

Route::get('/tiket', [TiketController::class, 'index']);

// Rute untuk Login dan Signup
Route::get('/home/login', [AuthController::class, 'showLogin']);
Route::post('/home/login', [AuthController::class, 'login']);
Route::get('/home/signup', [AuthController::class, 'showSignup']);
Route::post('/home/signup', [AuthController::class, 'signup']);

// Rute untuk Logout
Route::get('/logout', [AuthController::class, 'logout']);

// Rute untuk Admin
Route::get('/admin/dashboard', function(){
    return view('admin.dashboard');
});

Route::get('/admin/chat', function(){
    return view('admin.chat');
});
