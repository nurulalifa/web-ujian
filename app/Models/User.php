<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    protected $fillable = [
        'nama', 'email', 'password', 'no_hp', 'no_ortu', 'role',
    ];

    protected $hidden = [
        'password', 'remember_token',
    ];

    public function jawabanSiswa() {
        return $this->hasMany(JawabanSiswa::class, 'id_siswa', 'id');
    }

    public function nilaiAkhir() {
        return $this->hasMany(NilaiAkhir::class, 'id_siswa', 'id');
    }
}