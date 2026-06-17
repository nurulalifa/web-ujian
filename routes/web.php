<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Guru\DashboardController;
use App\Http\Controllers\Guru\SoalController;
use App\Http\Controllers\Guru\UjianController;
use App\Http\Controllers\Guru\SiswaController;
use App\Http\Controllers\Guru\NilaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// Redirect halaman utama langsung ke dashboard guru
Route::get('/', function () {
    return redirect()->route('guru.dashboard');
});

// Grouping Route untuk Guru
Route::prefix('guru')->name('guru.')->group(function () {
    
    // Halaman Utama Dashboard Guru
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Route Kelola Soal (Otomatis mencakup index, create, store, show, edit, update, destroy)
    Route::resource('soal', SoalController::class);
    
    // Route Kontrol Ujian (Diringkas menggunakan resource)
    Route::resource('ujian', UjianController::class)->except(['show']);
    
    // Route Kelola Siswa (Diringkas menggunakan resource)
    Route::resource('siswa', SiswaController::class)->except(['show']);

    // Route Rekap Nilai Siswa
    Route::get('/nilai-siswa', [NilaiController::class, 'index'])->name('nilai.index');
    
});