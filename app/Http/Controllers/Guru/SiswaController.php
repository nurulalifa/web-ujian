<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\User;

class SiswaController extends Controller
{
    public function index()
    {
        // Menampilkan list siswa terdaftar untuk dipantau status pengerjaannya
        $siswas = User::where('role', 'siswa')->get();
        return view('guru.siswa.index', compact('siswas'));
    }
}