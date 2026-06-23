<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return "Server Laravel Berhasil Berjalan!";
});

Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
Route::get('/siswa/ujian/{id}', [SiswaController::class, 'mulaiUjian'])->name('siswa.ujian');
Route::post('/siswa/ujian/{id}/selesai', [SiswaController::class, 'selesaiUjian'])->name('siswa.selesaiUjian');