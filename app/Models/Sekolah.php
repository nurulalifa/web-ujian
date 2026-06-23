<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sekolah extends Model
{
    use HasFactory;

    // Menentukan nama tabel yang ada di database kamu
    protected $table = 'sekolahs';

    // Mengizinkan kolom nama_sekolah diisi secara massal oleh seeder / form
    protected $fillable = [
        'nama_sekolah'
    ];

    // Relasi ke tabel Ujian (Satu sekolah bisa memiliki banyak jadwal ujian)
    public function ujians()
    {
        return $this->hasMany(Ujian::class, 'sekolah_id');
    }
}