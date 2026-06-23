<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('ujians', function (Blueprint $table) {
            $table->id(); // id_ujian
            $table->foreignId('sekolah_id')->nullable(); // Terhubung ke tabel sekolah
            $table->string('nama_ujian'); // Contoh: UTBK Tryout 2026 / UAS-UTS
            $table->date('tgl');
            $table->time('mulai_ujian');
            $table->time('selesai_ujian');
            // Solusi Error: Tambahkan kolom status untuk kontrol mulai/selesai
            $table->enum('status', ['belum', 'mulai', 'selesai'])->default('belum'); 
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('ujians');
    }
};