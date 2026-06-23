<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('users', function (Blueprint $table) {
<<<<<<< HEAD
            $table->id();
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('password');
            $table->string('no_hp');
            $table->string('no_ortu')->nullable();
            $table->enum('role', ['Admin', 'Guru', 'Siswa'])->default('Siswa');
            $table->timestamps();
=======
            // SOLUSI UTAMA: Wajib ada ID sebagai Primary Key untuk relasi Foreign Key tabel lain
            $table->id(); 
            
            $table->string('nama');
            $table->string('email')->unique();
            $table->string('no_hp');
            $table->string('no_ortu')->nullable();
            $table->enum('role', ['admin', 'guru', 'siswa']);
            $table->string('password');
            
            // Opsional tapi sangat disarankan: mencatat waktu data dibuat & diupdate
            $table->timestamps(); 
>>>>>>> 5b7ee1d359a3ed0b3861bd838a2dc06d7c468600
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('users');
    }
};