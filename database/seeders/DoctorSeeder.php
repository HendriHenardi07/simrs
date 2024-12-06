<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Doctor;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Doctor::create([
            'name' => 'Dr. John Doe',
            'specialization' => 'Spesialis Penyakit Dalam',
            'phone' => '081234567890'
        ]);

        Doctor::create([
            'name' => 'Dr. Jane Smith',
            'specialization' => 'Spesialis Anak',
            'phone' => '082345678901'
        ]);
    }
}
