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
        Schema::create('soals', function (Blueprint $table) {
            $table->id();
            
            // Relasi foreign key ke tabel induk ujian & jenis_ujian
            $table->foreignId('ujian_id')->constrained('ujians')->onDelete('cascade');
            $table->foreignId('jenis_ujian_id')->nullable()->constrained('jenis_ujians')->onDelete('cascade');
            
            $table->text('soal');                  // Teks pertanyaan
            $table->string('jawaban', 2);          // Kolom kunci jawaban (A/B/C/D/E)
            $table->integer('point')->default(5);  // Bobot nilai soal
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('soals');
    }
};