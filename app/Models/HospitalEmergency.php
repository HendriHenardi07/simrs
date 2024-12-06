<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class HospitalEmergency extends Model
{
    use HasFactory;

    protected $fillable = [
        'patient_id',
        'arrival_time',
        'symptoms',
        'initial_diagnosis',
        'status',
        'room_id',
    ];

    // Relasi dengan model Patient
    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    // Relasi dengan model Room
    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function inpatient()
    {
        return $this->hasOne(Inpatient::class, 'patient_id', 'patient_id');
    }

}

