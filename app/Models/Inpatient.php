<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Inpatient extends Model
{
    use HasFactory;

    protected $fillable = ['patient_id', 'room_id', 'admission_date', 'discharge_date', 'status'];
    protected $casts = [
        'admission_date' => 'date',
        'discharge_date' => 'date', // Pastikan discharge_date dicasting sebagai tanggal
    ];
    

    public function patient()
    {
        return $this->belongsTo(Patient::class);
    }

    public function room()
    {
        return $this->belongsTo(Room::class);
    }

    public function getStatusLabelAttribute()
    {
        return $this->status === 'discharged' ? 'Dipulangkan' : 'Masih dirawat';
    }

}


