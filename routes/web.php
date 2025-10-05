<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\KosController;
use App\Http\Controllers\KamarController;
use App\Http\Controllers\TiketController;
use App\Http\Controllers\AuthController;

Route::get('/', [HomeController::class, 'index']);

Route::get('/kos', [KosController::class, 'index']);

Route::get('/kos/create', [KosController::class, 'create']);

Route::get('/kos/detail/{id?}', [KosController::class, 'show']);

Route::get('/kos/detail/{id}/edit', [KosController::class, 'edit']);

Route::get('/kamar', [KamarController::class, 'index']);

Route::get('/kamar/detail/{id?}', [KamarController::class, 'show']);

Route::get('/tiket', [TiketController::class, 'index']);

Route::get('/home/login', [AuthController::class, 'showLogin']);
Route::post('/home/login', [AuthController::class, 'login']);
Route::get('/home/signup', [AuthController::class, 'showSignup']);
Route::post('/home/signup', [AuthController::class, 'signup']);
