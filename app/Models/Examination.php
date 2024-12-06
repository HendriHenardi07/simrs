<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Examination extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'examination_type_id',
        'description',
        'date',
    ];

    // Relasi dengan pasien
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relasi dengan jenis pemeriksaan
    public function examinationType()
    {
        return $this->belongsTo(ExaminationType::class, 'examination_type_id');
    }
}
