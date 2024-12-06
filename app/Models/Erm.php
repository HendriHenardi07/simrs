<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Erm extends Model
{
    use HasFactory;

    // Tentukan nama tabel yang sesuai
    protected $table = 'e_rm'; // Nama tabel di database

    protected $fillable = [
        'patient_id',
        'examination_id',
        'diagnosis',
        'treatment',
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

    // Hapus relasi examinationType karena kolom examination_type_id sudah dihapus
}

