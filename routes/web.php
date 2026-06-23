<?php

use Illuminate\Support\Facades\Route;
<<<<<<< HEAD
use App\Http\Controllers\SiswaController;

Route::get('/', function () {
    return "Server Laravel Berhasil Berjalan!";
});

Route::get('/siswa/dashboard', [SiswaController::class, 'dashboard'])->name('siswa.dashboard');
Route::get('/siswa/ujian/{id}', [SiswaController::class, 'mulaiUjian'])->name('siswa.ujian');
Route::post('/siswa/ujian/{id}/selesai', [SiswaController::class, 'selesaiUjian'])->name('siswa.selesaiUjian');
=======

//<<<<<<< HEAD
// Import semua Controller Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\SchoolController;
use App\Http\Controllers\Admin\ExamTypeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ScoreController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Guru\JenisUjianController;
use App\Http\Controllers\Guru\SoalController;
use App\Http\Controllers\Guru\UjianController;
use App\Http\Controllers\Guru\SiswaController;
use App\Http\Controllers\Guru\NilaiController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

// 1. Halaman Utama / Login Aplikasi (http://127.0.0.1:8000/)
Route::get('/', function () {
    return view('welcome');
});

// 2. GRUP RUTE MODUL ADMIN (http://127.0.0.1:8000/admin/...)
Route::prefix('admin')->name('admin.')->group(function () {

    // Halaman Dashboard Utama Admin
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Manajemen User
    Route::get('/users', [DashboardController::class, 'users'])->name('users.index');

    // CRUD Sekolah (Schools)
   Route::get('/schools', [SchoolController::class, 'index']);

    // CRUD Jenis Ujian (Exam Types)
    Route::resource('exam-types', ExamTypeController::class);

    // CRUD Siswa + Fitur Import CSV
    Route::resource('students', StudentController::class);
    Route::post('students/import', [StudentController::class, 'import'])->name('students.import');

    // CRUD Bank Soal + Fitur Import CSV
    Route::resource('questions', QuestionController::class);
    Route::post('questions/import', [QuestionController::class, 'import'])->name('questions.import');

    // Rekap Nilai Ujian
    Route::get('/scores', [ScoreController::class, 'index'])->name('scores.index');

    // 1. Rute untuk menampilkan halaman login (GET)
    // Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

    // // 2. Rute untuk memproses data login saat tombol ditekan (POST)
    // Route::post('/login', [AuthController::class, 'login']);
    // Catatan: Jika di form action kamu mengarahkannya ke '/', ubah rute POST di atas menjadi Route::post('/', ...)
});
// =======
// Import Controller khusus dari Folder Guru


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
// >>>>>>> b0ca6152fd9ed16e24d9dac231ec12399d15d7a8
>>>>>>> 5b7ee1d359a3ed0b3861bd838a2dc06d7c468600
