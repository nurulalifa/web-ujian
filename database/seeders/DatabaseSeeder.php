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
        User::create([
            'name' => 'Administrator SMKN 7',
            'email' => 'admin@smkn7pekanbaru.sch.id', // Bisa diganti 'username' jika kolomnya username
            'password' => Hash::make('passwordRahasia123'), // Otomatis enkripsi aman
            'role' => 'admin', // Jika tabel user-mu menggunakan sistem role
        ]);
    }
}