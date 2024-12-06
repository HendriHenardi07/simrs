<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RawatJalan extends Model
{
    use HasFactory;

    protected $table = 'rawat_jalan';

    protected $fillable = [
        'patient_id',
        'doctor_id',
        'visit_date',
        'complaints',
        'diagnosis',
        'treatment_plan',
        'follow_up_date',
    ];

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function doctor()
    {
        return $this->belongsTo(Doctor::class);
    }
}

