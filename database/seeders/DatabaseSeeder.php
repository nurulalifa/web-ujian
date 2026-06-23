<?php

namespace Database\Seeders;

use App\Models\User; // Pastikan model User di-import
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
<<<<<<< HEAD
        User::create([
            'name' => 'Administrator SMKN 7',
            'email' => 'admin@smkn7pekanbaru.sch.id', // Bisa diganti 'username' jika kolomnya username
            'password' => Hash::make('passwordRahasia123'), // Otomatis enkripsi aman
            'role' => 'admin', // Jika tabel user-mu menggunakan sistem role
=======
        // Memanggil semua seeder data agar dieksekusi bersamaan saat perintah diketik
        $this->call([
            UjianDataSeeder::class,   // Mengisi data Sekolah, Ujian, dan Sub/Jenis Ujian
            GuruUserSeeder::class,    // Mengisi data akun login Guru (guru@gmail.com)
>>>>>>> b0ca6152fd9ed16e24d9dac231ec12399d15d7a8
        ]);
    }
}