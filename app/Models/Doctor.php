<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Doctor extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'specialization', 'phone'];

    // Relasi dengan RawatJalan
    public function rawatJalans()
    {
        return $this->hasMany(RawatJalan::class);
    }
}

