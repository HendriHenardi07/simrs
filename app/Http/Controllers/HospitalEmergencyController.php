<?php

namespace App\Http\Controllers;

use App\Models\HospitalEmergency;
use App\Models\Inpatient;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;

class HospitalEmergencyController extends Controller
{
    // Menampilkan daftar pasien IGD
    public function index()
    {
        $emergencies = HospitalEmergency::with('patient', 'room')->get();
        return view('hospital_emergency.index', compact('emergencies'));
    }

    // Menampilkan form tambah pasien IGD
    public function create()
    {
        $patients = Patient::all();
        $rooms = Room::all();
        return view('hospital_emergency.create', compact('patients', 'rooms'));
    }

    // Menyimpan data pasien IGD
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'arrival_time' => 'required|date',
            'symptoms' => 'required|string',
        ]);

        // Simpan data pasien IGD
        HospitalEmergency::create([
            'patient_id' => $request->patient_id,
            'arrival_time' => $request->arrival_time,
            'symptoms' => $request->symptoms,
            'room_id' => $request->room_id, // Simpan kamar yang dipilih
            'status' => 'Waiting',
        ]);        

        return redirect()->route('hospital_emergency.index')->with('success', 'Data pasien berhasil ditambahkan.');
    }

    // Mengupdate status pasien di IGD
    public function updateStatus(Request $request, HospitalEmergency $hospitalEmergency, $status)
{
    if ($status === 'Transferred to Inpatient') {
        // Periksa apakah pasien sudah mendapatkan kamar
        if (!$hospitalEmergency->room_id) {
            return redirect()->back()->with('error', 'Pasien belum mendapatkan kamar.');
        }

        // Pindahkan pasien ke tabel Rawat Inap
        \App\Models\Inpatient::create([
            'patient_id' => $hospitalEmergency->patient_id,
            'room_id' => $hospitalEmergency->room_id, // Gunakan kamar yang sudah dipilih
            'admission_date' => now(),
            'status' => 'Masih dirawat',
        ]);
    }

    // Perbarui status pasien di tabel IGD
    $hospitalEmergency->update([
        'status' => $status,
    ]);

    return redirect()->route('hospital_emergency.index')->with('success', 'Status pasien berhasil diperbarui.');
}



}
