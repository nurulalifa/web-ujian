<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class GuruUserSeeder extends Seeder
{
    public function run(): void
    {
        // Membuat akun simulasi guru untuk login ke aplikasi ujian
        User::updateOrCreate(
            ['email' => 'guru@gmail.com'],
            [
                'name' => 'Guru Pengampu UTBK',
                'no_hp' => '081234567891',
                'password' => Hash::make('password'), // Password untuk login: password
                'role' => 'guru'
            ]
        );
    }
}
