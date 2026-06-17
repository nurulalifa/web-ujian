<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\User;
use App\Models\Nilai;

class DashboardController extends Controller
{
    public function index()
    {
        // Menghitung jumlah data real dari database
        $soal = Soal::count();
        $ujian = Ujian::count();
        
        // Menghitung user yang rolenya 'Siswa'
        $siswa = User::where('role', 'Siswa')->count(); 
        
        // Menghitung berapa banyak data nilai yang sudah masuk
        $nilai = Nilai::count();

        return view('guru.dashboard', compact('soal', 'ujian', 'siswa', 'nilai'));
    }
}