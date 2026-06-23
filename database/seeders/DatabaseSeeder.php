<?php

namespace Database\Seeders;

use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Memanggil semua seeder data agar dieksekusi bersamaan saat perintah diketik
        $this->call([
            UjianDataSeeder::class,   // Mengisi data Sekolah, Ujian, dan Sub/Jenis Ujian
            GuruUserSeeder::class,    // Mengisi data akun login Guru (guru@gmail.com)
        ]);
    }
}