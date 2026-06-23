<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisUjian extends Model
{
    use HasFactory;

    // Nama tabel di database sesuai dengan file migration kamu
    protected $table = 'jenis_ujians'; 

    // SOLUSI ERROR: Mengizinkan kolom ini untuk menyimpan data dari form
    protected $fillable = [
        'nama_jenis_ujian'
    ];
}