<?php

namespace App\Http\Controllers;

use App\Models\RawatJalan;
use App\Models\Patient;
use App\Models\Doctor;
use Illuminate\Http\Request;

class RawatJalanController extends Controller
{
    // Menampilkan daftar rawat jalan
    public function index()
    {
        $rawatJalans = RawatJalan::with('patient', 'doctor')->get();
        return view('rawat_jalan.index', compact('rawatJalans'));
    }

    // Menampilkan form tambah rawat jalan
    public function create()
    {
        $patients = Patient::all();
        $doctors = Doctor::all();
        return view('rawat_jalan.create', compact('patients', 'doctors'));
    }

    // Menyimpan data rawat jalan
    public function store(Request $request)
{
    // Validasi input data
    $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'doctor_id' => 'required|exists:doctors,id',
        'visit_date' => 'required|date',
        'complaints' => 'required|string|max:255', // Keluhan pasien
        'diagnosis' => 'required|string|max:255',
        'treatment_plan' => 'required|string|max:255', // Rencana perawatan
        'follow_up_date' => 'nullable|date', // Tanggal follow-up (opsional)
    ]);

    // Menyimpan data rawat jalan
    RawatJalan::create([
        'patient_id' => $request->patient_id,
        'doctor_id' => $request->doctor_id,
        'visit_date' => $request->visit_date,
        'complaints' => $request->complaints,  // Keluhan
        'diagnosis' => $request->diagnosis,
        'treatment_plan' => $request->treatment_plan,  // Rencana perawatan
        'follow_up_date' => $request->follow_up_date, // Tanggal follow-up
    ]);

    // Setelah data disimpan, arahkan kembali ke halaman daftar rawat jalan
    return redirect()->route('rawat-jalan.index')->with('success', 'Data rawat jalan berhasil disimpan.');
}


    // Menampilkan form edit rawat jalan
    public function edit($id)
{
    // Ambil data rawat jalan berdasarkan ID
    $rawatJalan = RawatJalan::findOrFail($id);
    
    // Ambil semua data pasien dan dokter untuk dropdown
    $patients = Patient::all();
    $doctors = Doctor::all();

    // Kembalikan tampilan edit dengan membawa data rawat jalan, pasien, dan dokter
    return view('rawat_jalan.edit', compact('rawatJalan', 'patients', 'doctors'));
}

public function update(Request $request, $id)
{
    // Validasi input data
    $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'doctor_id' => 'required|exists:doctors,id',
        'visit_date' => 'required|date',
        'complaints' => 'required|string|max:255',
        'diagnosis' => 'required|string|max:255',
        'treatment_plan' => 'required|string|max:255',
        'follow_up_date' => 'nullable|date',
    ]);

    // Temukan data rawat jalan yang ingin diubah
    $rawatJalan = RawatJalan::findOrFail($id);

    // Update data rawat jalan
    $rawatJalan->update([
        'patient_id' => $request->patient_id,
        'doctor_id' => $request->doctor_id,
        'visit_date' => $request->visit_date,
        'complaints' => $request->complaints,
        'diagnosis' => $request->diagnosis,
        'treatment_plan' => $request->treatment_plan,
        'follow_up_date' => $request->follow_up_date,
    ]);

    // Setelah data diupdate, kembali ke halaman daftar rawat jalan
    return redirect()->route('rawat-jalan.index')->with('success', 'Data rawat jalan berhasil diperbarui.');
}


    // Menghapus data rawat jalan
    public function destroy($id)
    {
        $rawatJalan = RawatJalan::findOrFail($id);
        $rawatJalan->delete();

        return redirect()->route('rawat-jalan.index');
    }
}


