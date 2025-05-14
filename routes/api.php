<?php

use App\Http\Controllers\PrayerTimeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

// Route::get('prayer-time/{location}/{date}', [PrayerTimeController::class, 'index']); ->pengisian tanggal masi manual
Route::get('prayer-time/{location}', [PrayerTimeController::class, 'index']);
