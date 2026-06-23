<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Soal extends Model
{
    use HasFactory;

    protected $table = 'soals';

    // Membuka proteksi mass assignment untuk kolom-kolom soal
    protected $fillable = [
        'ujian_id',
        'jenis_ujian_id',
        'soal',
        'jawaban',
        'point'
    ];

    // Relasi ke tabel Ujian
    public function ujian()
    {
        return $this->belongsTo(Ujian::class, 'ujian_id');
    }

    // Relasi ke tabel Jenis Ujian
    public function jenisUjian()
    {
        return $this->belongsTo(JenisUjian::class, 'jenis_ujian_id');
    }
}