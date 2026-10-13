<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ItemReportController;
use App\Http\Controllers\ItemClaimController;

Route::get('/', [HomeController::class, 'index'])
    ->name('home');

// Login dan registrasi
Route::middleware('guest')->group(function () {
    Route::get('/register', [AuthController::class, 'showRegister'])
        ->name('register');

    Route::post('/register', [AuthController::class, 'register'])
        ->name('register.store');

    Route::get('/login', [AuthController::class, 'showLogin'])
        ->name('login');

    Route::post('/login', [AuthController::class, 'login'])
        ->name('login.store');
});

// Fitur untuk pengguna yang sudah login
Route::middleware('auth')->group(function () {
    Route::get('/laporan/buat', [ItemReportController::class, 'create'])
        ->name('reports.create');

    Route::post('/laporan', [ItemReportController::class, 'store'])
        ->name('reports.store');

    Route::post('/laporan/{report}/klaim', [ItemClaimController::class, 'store'])
        ->name('claims.store');

    Route::patch('/klaim/{claim}', [ItemClaimController::class, 'update'])
        ->name('claims.update');

    Route::post('/logout', [AuthController::class, 'logout'])
        ->name('logout');
});
