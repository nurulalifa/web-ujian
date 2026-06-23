<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    protected $table = 'ujian';
    protected $primaryKey = 'id_ujian';

    protected $fillable = [
        'Nama Ujian', 'tgl', 'mulai_ujian', 'selesai_ujian',
    ];

    public function nilaiAkhir() {
        return $this->hasMany(NilaiAkhir::class, 'id_ujian', 'id_ujian');
    }
}