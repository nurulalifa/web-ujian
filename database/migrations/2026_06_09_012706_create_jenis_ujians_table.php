<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('jenis_ujians', function (Blueprint $table) {
            $table->id(); // id_sub_ujian
            $table->string('nama_jenis_ujian'); // Contoh: TPS, UTBK-Saintek, UTS, UAS
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('jenis_ujians');
    }
};