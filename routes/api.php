<?php

use App\Http\Controllers\LocationController;
use Illuminate\Support\Facades\Route;

// Rutas de la API
Route::middleware(['api.key'])->group(function () {
    Route::get('/locations', [LocationController::class, 'index']);
});
