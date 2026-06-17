<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    // Menentukan nama tabel (pastikan sesuai dengan nama tabel Anda di database)
    protected $table = 'soals';

    // Menampung kolom-kolom agar diizinkan untuk disimpan
    protected $fillable = [
        'ujian_id',
        'pertanyaan',
        'a',
        'b',
        'c',
        'd',
        'jawaban'
    ];

    /**
     * Relasi ke model Ujian
     * Ini fungsi yang dicari oleh SoalController agar tidak error lagi
     */
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }
}