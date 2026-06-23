<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('nilais', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade'); // ID Siswa
            $table->foreignId('ujian_id')->constrained('ujians')->onDelete('cascade');
            $table->json('skor_detail'); // Menyimpan data array [id_soal => poin] format JSON
            $table->integer('total_nilai')->default(0);
            $table->text('rekomendasi_kampus')->nullable(); // Rekomendasi Kampus / Sekolah otomatis
            $table->enum('persetujuan_siswa', ['belum', 'setuju'])->default('belum'); // Fitur WA Gateway persetujuan siswa
            $table->enum('persetujuan_ortu', ['belum', 'setuju'])->default('belum'); // Fitur WA Gateway persetujuan ortu
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('nilais');
    }
};