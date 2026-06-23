<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Ujian;
use App\Models\NilaiAkhir;
use App\Models\User;

class SiswaController extends Controller
{
    // 1. Menampilkan Dashboard Utama Siswa
    public function dashboard()
    {
        $ujianAktif = Ujian::all();
        $riwayatNilai = NilaiAkhir::where('id_siswa', 1)->get();

        return view('siswa.dashboard', compact('ujianAktif', 'riwayatNilai'));
    }

    // 2. Menampilkan Ruang Ujian
    public function mulaiUjian($id_ujian)
    {
        $ujian = Ujian::findOrFail($id_ujian);
        return view('siswa.ujian', compact('ujian'));
    }

    // 3. Menyimpan Hasil Nilai Ujian
    public function selesaiUjian(Request $request, $id_ujian)
    {
        $totalSkor = 78;
        $rekomendasi = "Rekomendasi Kampus: Universitas Diponegoro / Unair (Lolos Kategori B)";

        // Memastikan User dengan ID 1 tersedia di database agar tidak memicu foreign key error


        // Simpan data nilai akhir ke database
        NilaiAkhir::create([
            'id_siswa' => 1,
            'id_ujian' =>1,
            'total_nilai' => $totalSkor,
            'rekomendasi' => $rekomendasi
        ]);

        return redirect()->to('siswa/dashboard')->with('success', 'Ujian selesai!');
    }
}
