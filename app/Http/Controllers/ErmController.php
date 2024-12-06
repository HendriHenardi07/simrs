<?php

namespace App\Http\Controllers;

use App\Models\eRm;
use App\Models\Examination;
use App\Models\Patient;
use Illuminate\Http\Request;

class ErmController extends Controller
{
    // Menampilkan daftar rekam medis
    public function index()
    {
        $erms = eRm::with('patient', 'examination')->get(); // Mengambil relasi dengan examinationType tidak diperlukan lagi
        return view('erm.index', compact('erms'));
    }

    // Menampilkan form tambah rekam medis
    public function create()
    {
        $patients = Patient::all();
        $examinations = Examination::all(); // Pastikan relasi jenis pemeriksaan dimuat
        return view('erm.create', compact('patients', 'examinations'));
    }

    // Menyimpan data rekam medis
    public function store(Request $request)
    {
        // Validasi data
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'examination_id' => 'required|exists:examinations,id',
            'diagnosis' => 'required|string|max:255',
            'treatment' => 'required|string|max:255',
        ]);

        // Menyimpan data rekam medis tanpa examination_type_id
        eRm::create([
            'patient_id' => $request->patient_id,
            'examination_id' => $request->examination_id,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
        ]);

        return redirect()->route('erm.index');
    }

    // Menampilkan form edit rekam medis
    public function edit($id)
    {
        $erm = eRm::findOrFail($id);
        $patients = Patient::all();
        $examinations = Examination::all();

        return view('erm.edit', compact('erm', 'patients', 'examinations')); // Hapus examinationTypes dari view
    }

    // Menyimpan pembaruan data rekam medis
    public function update(Request $request, $id)
    {
        // Validasi data
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'examination_id' => 'required|exists:examinations,id',
            'diagnosis' => 'required|string|max:255',
            'treatment' => 'required|string|max:255',
        ]);

        $erm = eRm::findOrFail($id);
        $erm->update([
            'patient_id' => $request->patient_id,
            'examination_id' => $request->examination_id,
            'diagnosis' => $request->diagnosis,
            'treatment' => $request->treatment,
        ]);

        return redirect()->route('erm.index');
    }

    // Menghapus data rekam medis
    public function destroy($id)
    {
        $erm = eRm::findOrFail($id);
        $erm->delete();

        return redirect()->route('erm.index');
    }
}
