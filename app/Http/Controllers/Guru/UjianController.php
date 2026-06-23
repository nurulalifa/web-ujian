<?php

namespace App\Http\Controllers\Guru;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\Sekolah;

class UjianController extends Controller
{
    /**
     * Menampilkan Form Pembuatan Jadwal & Tabel Monitoring
     */
    public function index()
    {
        // 1. Ambil semua data sekolah dari database
        $sekolahs = Sekolah::all();

        // 2. KONTROL DARURAT: Jika database kosong, kita paksa buatkan data SMKN 7 Pekanbaru langsung di sini
        if ($sekolahs->isEmpty()) {
            Sekolah::create(['id' => 1, 'nama_sekolah' => 'SMKN 7 Pekanbaru']);
            $sekolahs = Sekolah::all(); // Ambil ulang setelah dibuat
        }
        
        // 3. Ambil data jadwal ujian beserta sekolahnya
        $ujians = Ujian::with('sekolah')->get();

        // 4. Kirimkan data ke view
        return view('guru.ujian.index', compact('sekolahs', 'ujians'));
    }

    /**
     * Menyimpan Jadwal Sesi Ujian Baru ke Database
     */
    public function store(Request $request)
    {
        $request->validate([
            'sekolah_id'    => 'required',
            'nama_ujian'    => 'required|string|max:255',
            'tgl'           => 'required|date',
            'mulai_ujian'   => 'required',
            'selesai_ujian' => 'required',
        ]);

        Ujian::create([
            'sekolah_id'    => $request->sekolah_id,
            'nama_ujian'    => $request->nama_ujian,
            'tgl'           => $request->tgl,
            'mulai_ujian'   => $request->mulai_ujian,
            'selesai_ujian' => $request->selesai_ujian,
            'status'        => 'belum', //
        ]);

        return redirect()->route('guru.ujian.index')->with('success', 'Jadwal sesi ujian baru berhasil didaftarkan!');
    }

    /**
     * Mengubah Status Sakelar Ujian
     */
    public function toggle(Request $request, $id)
    {
        $ujian = Ujian::findOrFail($id);
        
        $request->validate([
            'status' => 'required|in:belum,mulai,selesai'
        ]);

        $ujian->update([
            'status' => $request->status
        ]);

        return redirect()->route('guru.ujian.index')->with('success', 'Status akses sesi ujian berhasil diperbarui!');
    }
}