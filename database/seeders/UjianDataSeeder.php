<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Sekolah;
use App\Models\JenisUjian;

class UjianDataSeeder extends Seeder
{
    public function run(): void
    {
        // Menggunakan updateOrCreate agar data dimasukkan dengan aman tanpa menghapus paksa tabel
        Sekolah::updateOrCreate(
            ['id' => 1],
            ['nama_sekolah' => 'SMKN 7 Pekanbaru']
        );

        // Masukkan data sub/jenis ujian pilihan untuk dropdown pembuatan soal
        JenisUjian::updateOrCreate(
            ['id' => 1],
            ['nama_jenis_ujian' => 'Tes Potensi Skolastik (TPS)']
        );

        JenisUjian::updateOrCreate(
            ['id' => 2],
            ['nama_jenis_ujian' => 'Literasi Bahasa Inggris']
        );

        JenisUjian::updateOrCreate(
            ['id' => 3],
            ['nama_jenis_ujian' => 'Penalaran Matematika']
        );
    }
}