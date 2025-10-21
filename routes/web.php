<?php

use App\Http\Controllers\ChirpController;
use Illuminate\Support\Facades\Route;

Route::get('/welcome', function () {
    return view('welcome');
});

Route::get('/', [ChirpController::class, 'index']);
Route::post('/chirps', [ChirpController::class, 'store']);

