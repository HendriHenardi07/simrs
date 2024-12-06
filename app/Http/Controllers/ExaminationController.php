<?php

namespace App\Http\Controllers;

use App\Models\Examination;
use App\Models\Patient;
use App\Models\ExaminationType; // Import model ExaminationType
use Illuminate\Http\Request;

class ExaminationController extends Controller
{
    // Menampilkan form untuk menambah pemeriksaan
    public function create()
    {
        $patients = Patient::all();  // Ambil semua pasien
        $examinationTypes = ExaminationType::all();  // Ambil semua jenis pemeriksaan
        return view('examinations.create', compact('patients', 'examinationTypes'));
    }


    // Menyimpan data pemeriksaan pasien
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'examination_type_id' => 'required|exists:examination_types,id', // Validasi untuk jenis pemeriksaan
            'description' => 'required|string',
            'date' => 'required|date',
        ]);

        // Simpan data pemeriksaan dengan examination_type_id yang dipilih
        Examination::create($validated);

        return redirect('/examinations');  // Redirect ke halaman daftar pemeriksaan
    }


    // Menampilkan daftar pemeriksaan pasien
    public function index()
    {
        $examinations = Examination::with(['patient', 'examinationType'])->get();  // Mengambil pemeriksaan beserta data pasien dan jenis pemeriksaannya
        return view('examinations.index', compact('examinations'));
    }
}
