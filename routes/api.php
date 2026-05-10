<?php

use App\Http\Controllers\AntrianController;
use App\Http\Controllers\BookingController;
use App\Http\Controllers\DokterController;
use App\Http\Controllers\PasienController;
use Illuminate\Support\Facades\Route;

Route::apiResource('pasien', PasienController::class);
Route::apiResource('dokter', DokterController::class);
Route::apiResource('booking', BookingController::class);
Route::get('antrian', [AntrianController::class, 'index']);
Route::get('antrian/{antrian}', [AntrianController::class, 'show']);
Route::patch('antrian/{antrian}', [AntrianController::class, 'update']);
Route::get('antrian/next/{dokterId}', [AntrianController::class, 'getNextAntrian']);