<?php

use App\Http\Controllers\AdminController;
use App\Http\Controllers\PasienBookingController;
use App\Http\Controllers\PasienViewController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('patient.dashboard');
})->middleware(['auth'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::prefix('pasien')->group(function () {
    Route::get('/dashboard', [PasienViewController::class, 'dashboard'])->middleware(['auth']);
    Route::get('/booking', [PasienViewController::class, 'booking'])->middleware(['auth']);
    Route::get('/antrian', [PasienViewController::class, 'antrian'])->middleware(['auth']);
    Route::get('/riwayat', [PasienViewController::class, 'riwayat'])->middleware(['auth']);
    Route::post('/booking', [PasienBookingController::class, 'store'])->middleware(['auth']);
});

Route::prefix('admin')->group(function () {
    Route::get('/dashboard', [AdminController::class, 'dashboard']);
    Route::get('/antrian', [AdminController::class, 'antrian']);
    Route::get('/antrian/{antrian}/panggil', [AdminController::class, 'panggilAntrian']);
    Route::get('/antrian/{antrian}/selesai', [AdminController::class, 'selesaiAntrian']);
    Route::get('/antrian/{antrian}/skip', [AdminController::class, 'skipAntrian']);
    Route::get('/bookings', [AdminController::class, 'bookings']);
    Route::get('/bookings/{booking}/{status}', [AdminController::class, 'updateBookingStatus']);
    Route::get('/dokters', [AdminController::class, 'dokters']);
    Route::get('/pasien', [AdminController::class, 'pasien']);
});

require __DIR__.'/auth.php';
