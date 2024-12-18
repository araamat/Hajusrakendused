<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\WeatherController;

// Ensure that the WeatherController class exists in the specified namespace
// If it does not exist, create it in the App\Http\Controllers directory
Route::get('/', [WeatherController::class, 'show']);




Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
