<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Akun Administrator
        User::create([
            'name'     => 'Administrator SMKN 7',
            'email'    => 'admin@smkn7pekanbaru.sch.id',
            'password' => Hash::make('passwordRahasia123'),
            'role'     => 'admin',
        ]);

        // Jalankan seeder lainnya
        $this->call([
            UjianDataSeeder::class,
            GuruUserSeeder::class,
        ]);
    }
}
