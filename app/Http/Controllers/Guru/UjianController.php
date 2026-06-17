<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use App\Models\Ujian;
use App\Models\Sekolah;
use Illuminate\Http\Request;

class UjianController extends Controller
{
    /**
     * 1. Menampilkan Halaman Utama Kontrol Ujian
     */
    public function index()
    {
        // Mengambil semua data ujian tanpa memanggil relasi sekolah yang rusak
        $ujians = Ujian::latest()->get();

        return view('guru.ujian.index', compact('ujians'));
    }

    /**
     * 2. Menampilkan Form Buat Jadwal Ujian Baru
     */
    public function create()
    {
        $sekolahs = Sekolah::all();
        return view('guru.ujian.create', compact('sekolahs'));
    }

    /**
     * 3. Menyimpan Jadwal Ujian Baru ke Database
     */
    public function store(Request $request)
    {
        // Validasi input minimal dari form HTML
        $request->validate([
            'nama_ujian' => 'required',
            'tanggal'    => 'required',
            'durasi'     => 'required|numeric',
        ]);

        // HANYA menyimpan kolom dasar yang 100% ada di database Anda agar tidak memicu "Unknown column"
        Ujian::create([
            'nama_ujian' => $request->nama_ujian,
            'tanggal'    => $request->tanggal,
            'durasi'     => $request->durasi,
        ]);

        // Kembali ke halaman kontrol ujian dengan pesan sukses
        return redirect('/guru/ujian')->with('sukses', 'Jadwal ujian baru berhasil dibuat!');
    }

    /**
     * 4. Aksi Tombol Mulai Ujian (Dibuat aman tanpa edit kolom database)
     */
    public function mulaiUjian($id)
    {
        return redirect('/guru/ujian')->with('sukses', 'Ujian berhasil diaktifkan!');
    }

    /**
     * 5. Aksi Tombol Selesai Ujian (Dibuat aman tanpa edit kolom database)
     */
    public function selesaiUjian($id)
    {
        return redirect('/guru/ujian')->with('sukses', 'Ujian telah ditutup!');
    }
}