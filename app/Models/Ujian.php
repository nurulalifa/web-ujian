<?php

namespace App\Models;

<<<<<<< HEAD
=======
use Illuminate\Database\Eloquent\Factories\HasFactory;
>>>>>>> 5b7ee1d359a3ed0b3861bd838a2dc06d7c468600
use Illuminate\Database\Eloquent\Model;

class Ujian extends Model
{
<<<<<<< HEAD
    protected $table = 'ujian';
    protected $primaryKey = 'id_ujian';

    protected $fillable = [
        'Nama Ujian', 'tgl', 'mulai_ujian', 'selesai_ujian',
    ];

    public function nilaiAkhir() {
        return $this->hasMany(NilaiAkhir::class, 'id_ujian', 'id_ujian');
=======
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
>>>>>>> 5b7ee1d359a3ed0b3861bd838a2dc06d7c468600
    }
}