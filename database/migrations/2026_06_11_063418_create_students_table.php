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
        Schema::create('students', function (Blueprint $class) {
            $class->id();
            $class->string('nisn')->unique()->nullable();
            $class->string('name');
            $class->foreignId('school_id')->nullable()->constrained('sekolah')->onDelete('cascade');
            $class->string('username')->unique();
            $class->string('password');
            $class->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('students');
    }
};