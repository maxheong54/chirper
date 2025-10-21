<?php

use App\Http\Controllers\Auth\Register;
use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [ChirpController::class, 'index']);

// Route::middleware('auth')->group(function () {
//     Route::post('/chirps', [ChirpController::class, 'store']);
//     Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
//     Route::put('chirps/{chirp}', [ChirpController::class, 'update']);
//     Route::delete('chirps/{chirp}', [ChirpController::class, 'destroy']);
// });

Route::middleware('auth')->group(function () {
    Route::resource('chirps', ChirpController::class)
    ->only(['store', 'edit', 'update', 'destroy']);
});

// Route::post('/chirps', [ChirpController::class, 'store']);
// Route::get('/chirps/{chirp}/edit', [ChirpController::class, 'edit']);
// Route::put('chirps/{chirp}', [ChirpController::class, 'update']);
// Route::delete('chirps/{chirp}', [ChirpController::class, 'destroy']);

// Route::resource('chirps', ChirpController::class)
//     ->only(['store', 'edit', 'update', 'destroy']);

Route::view('/register', 'auth.register')
    ->middleware('guest')
    ->name('register');

Route::post('/register', Register::class)
    ->middleware('guest');