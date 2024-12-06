<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Room extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'type', 'capacity'];

    public function inpatients()
    {
        return $this->hasMany(Inpatient::class);
    }

    public function isAvailable()
    {
        // Hitung jumlah pasien rawat inap aktif
        $occupied = $this->inpatients()->where('status', 'active')->count();
        return $occupied < $this->capacity;
    }
}
