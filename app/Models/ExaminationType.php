<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ExaminationType extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relasi dengan pemeriksaan
    public function examinations()
    {
        return $this->hasMany(Examination::class);
    }
}
