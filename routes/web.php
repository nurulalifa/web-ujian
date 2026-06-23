<?php

use Illuminate\Support\Facades\Route;

// Import Controller khusus dari Folder Guru
use App\Http\Controllers\Guru\DashboardController;
use App\Http\Controllers\Guru\JenisUjianController;
use App\Http\Controllers\Guru\SoalController;
use App\Http\Controllers\Guru\UjianController;
use App\Http\Controllers\Guru\SiswaController;
use App\Http\Controllers\Guru\NilaiController;

// Redirect halaman awal langsung ke dashboard guru
Route::redirect('/', '/guru/dashboard');

// Group Route Modul Guru
Route::prefix('guru')->name('guru.')->group(function () {
    
    // 1. Dashboard Info
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // 2. Manajemen Soal & Import Excel
    Route::post('/soal/import', [SoalController::class, 'import'])->name('soal.import');
    Route::resource('/soal', SoalController::class);

    // 3. CRUD Jenis Ujian (Sub Ujian)
    Route::resource('/jenis-ujian', JenisUjianController::class);

    // 4. Kontrol Jadwal & Aktivasi Ujian
    // Kita pecah manual rutenya agar terbaca super stabil oleh Laravel
    Route::get('/ujian', [UjianController::class, 'index'])->name('ujian.index');
    Route::post('/ujian', [UjianController::class, 'store'])->name('ujian.store');
    Route::post('/ujian/toggle/{id}', [UjianController::class, 'toggle'])->name('ujian.toggle'); // Disinkronkan ke fungsi toggle()

    // 5. Monitoring Status Siswa
    Route::get('/status-siswa', [SiswaController::class, 'index'])->name('siswa.index');

    // 6. Monitoring Nilai Siswa
    Route::get('/nilai', [NilaiController::class, 'index'])->name('nilai.index');
});