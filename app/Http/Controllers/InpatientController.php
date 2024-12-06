<?php

namespace App\Http\Controllers;

use App\Models\Inpatient;
use App\Models\Patient;
use App\Models\Room;
use Illuminate\Http\Request;

class InpatientController extends Controller
{
    // Menampilkan daftar rawat inap
    public function index()
    {
        $inpatients = Inpatient::with('patient', 'room')->get();
        return view('inpatient.index', compact('inpatients'));
    }


    // Menampilkan form tambah rawat inap
    public function create()
    {
        $patients = Patient::all();
        $rooms = Room::whereNotIn('id', function ($query) {
            $query->select('room_id')->from('inpatients')->where('status', 'Masih dirawat');
        })->get(); // Memilih kamar yang belum digunakan untuk pasien rawat inap

        return view('inpatient.create', compact('patients', 'rooms'));
    }

    // Menyimpan data rawat inap
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'room_id' => 'required|exists:rooms,id',
            'admission_date' => 'required|date',
        ]);

        // Menyimpan pasien dengan status "Masih dirawat"
        Inpatient::create([
            'patient_id' => $request->patient_id,
            'room_id' => $request->room_id,
            'admission_date' => $request->admission_date,
            'status' => 'Masih dirawat', // Status pertama kali adalah "Masih dirawat"
        ]);

        return redirect()->route('inpatients.index');
    }

    // Proses pemulangan pasien
    public function discharge(Inpatient $inpatient)
    {

        
        // Memastikan pasien yang dipulangkan adalah yang "Masih dirawat"
        if ($inpatient->status !== 'Masih dirawat') {
            return redirect()->route('inpatients.index')->with('error', 'Pasien ini sudah dipulangkan.');
        }

        // Memperbarui status dan tanggal keluar pasien
        $inpatient->update([
            'status' => 'Dipulangkan',
            'discharge_date' => now(), // Tanggal keluar pasien
        ]);

        return redirect()->route('inpatients.index')->with('success', 'Pasien telah dipulangkan.');
    }
}
