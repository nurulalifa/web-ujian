<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class JawabanSiswa extends Model
{
    protected $table = 'jawaban_siswa';

    protected $fillable = [
        'id_siswa', 'id_soal', 'jawaban_user', 'skor_soal',
    ];
}