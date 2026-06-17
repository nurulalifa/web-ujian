<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $table = 'ujians';

    protected $fillable = [
        'nama_ujian',
        'tanggal',
        'durasi',
        'mulai_ujian',
        'selesai_ujian'
    ];
}