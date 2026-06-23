<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('jawaban_siswas', function (Blueprint $table) {
            $table->id();
            
            // Menggunakan foreignId() standar Laravel agar tipe datanya otomatis sama persis dengan tabel induk
            $table->foreignId('user_id')->constrained('users')->onDelete('cascade');
            $table->foreignId('soal_id')->constrained('soals')->onDelete('cascade');
            
            // Kolom pelengkap jawaban siswa
            $table->string('jawaban_siswa', 2)->nullable(); // Jawaban yang dipilih siswa (A/B/C/D/E)
            $table->integer('is_benar')->default(0);        // Status kebenaran (1 jika benar, 0 jika salah)
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('jawaban_siswas');
    }
};