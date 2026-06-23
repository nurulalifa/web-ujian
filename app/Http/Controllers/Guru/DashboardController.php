<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Soal;
use App\Models\Ujian;
use App\Models\User;

class DashboardController extends Controller
{
    public function index()
    {
        return view('guru.dashboard', [
            'totalSoal' => Soal::count(),
            // 'ujianAktif' => Ujian::where('status', 'mulai')->count(),
            'siswaOnline' => User::where('role', 'siswa')->count()
        ]);
    }
}
