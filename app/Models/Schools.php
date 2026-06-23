<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Schools extends Model
{
    protected $table = 'schools';

    protected $fillable = [
        'name',
        'address',
        'phone_number',
        'email',
    ];

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
