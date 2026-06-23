<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $table = 'ujians';

    protected $fillable = [
        'sekolah_id',
        'nama_ujian',
        'tgl',
        'mulai_ujian',
        'selesai_ujian',
        'status' // Penting untuk sakelar mulai/selesai ujian
    ];

    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }
}