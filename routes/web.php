<?php

use Illuminate\Support\Facades\Route;

// Import semua Controller Admin
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\admin\SchoolController;
use App\Http\Controllers\Admin\ExamTypeController;
use App\Http\Controllers\Admin\StudentController;
use App\Http\Controllers\Admin\QuestionController;
use App\Http\Controllers\Admin\ScoreController;
use App\Http\Controllers\AuthController;

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
    Route::get('/', [AuthController::class, 'showLoginForm'])->name('login');

    // 2. Rute untuk memproses data login saat tombol ditekan (POST)
    Route::post('/login', [AuthController::class, 'login']); 
    // Catatan: Jika di form action kamu mengarahkannya ke '/', ubah rute POST di atas menjadi Route::post('/', ...)
}); 