<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Patient extends Model
{
    use HasFactory;

    // Definisikan kolom yang bisa diisi (fillable)
    protected $fillable = [
        'name',
        'gender',
        'dob',
        'address',
        'phone',
    ];

    /**
     * Relasi ke model Examination
     */
    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }
}
