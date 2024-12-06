<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LaboratoryTest extends Model
{
    use HasFactory;

    protected $dates = ['test_date'];

    protected $fillable = [
        'patient_id',
        'examination_id',
        'result',
        'test_date',
    ];

    // Relasi dengan model Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relasi dengan model Examination
    public function examination()
    {
        return $this->belongsTo(Examination::class);
    }
}

