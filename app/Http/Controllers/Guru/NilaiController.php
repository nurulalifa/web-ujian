<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\JawabanSiswa; // Sesuaikan dengan nama model jawaban/nilai kamu
use App\Models\Ujian;
use Illuminate\Http\Request;

class NilaiController extends Controller
{
    public function index()
    {
        // Mengambil data jawaban siswa beserta relasi ujian dan siswanya
        // Sesuaikan 'siswa' dan 'ujian' dengan nama relasi di model JawabanSiswa kamu
        $nilais = JawabanSiswa::with(['siswa', 'ujian'])->latest()->get();

        return view('guru.nilai.index', compact('nilais'));
    }
}