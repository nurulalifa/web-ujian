<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
    use HasFactory;

    protected $table = 'ujians';

    protected $primaryKey = 'id';

    protected $fillable = [
        'id',
        'sekolah_id',
        'nama_ujian',
        'tgl',
        'mulai_ujian',
        'selesai_ujian',
        'status',
    ];

    /**
     * Relasi ke Sekolah
     */
    public function sekolah()
    {
        return $this->belongsTo(Sekolah::class, 'sekolah_id');
    }

    /**
     * Relasi ke Nilai Akhir
     */
    public function nilaiAkhir()
    {
        return $this->hasMany(NilaiAkhir::class, 'id_ujian', 'id_ujian');
    }
}
