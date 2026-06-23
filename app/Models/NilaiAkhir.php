<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class NilaiAkhir extends Model
{
    protected $table = 'nilai_akhir';

    protected $fillable = [
        'id_siswa', 'id_ujian', 'total_nilai', 'rekomendasi',
    ];

    public function ujian() {
        return $this->belongsTo(Ujian::class, 'id_ujian', 'id_ujian');
    }
}