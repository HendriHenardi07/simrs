<?php

namespace App\Http\Controllers;

use App\Models\RadiologyTest;
use App\Models\Patient;
use Illuminate\Http\Request;

class RadiologyTestController extends Controller
{
    // Menampilkan daftar tes radiologi
    public function index()
    {
        $radiologyTests = RadiologyTest::with('patient')->get();  // Mengambil data tes radiologi
        return view('radiology.index', compact('radiologyTests'));
    }

    // Menampilkan form tambah tes radiologi
    public function create()
    {
        $patients = Patient::all();  // Ambil semua pasien
        return view('radiology.create', compact('patients'));
    }

    // Menyimpan data tes radiologi
    public function store(Request $request)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'exam_type' => 'required|string|max:255',
            'exam_result' => 'required|string',
            'exam_date' => 'required|date',
        ]);

        RadiologyTest::create($request->all());

        return redirect()->route('radiology.index');
    }

    // Menampilkan form edit tes radiologi
    public function edit($id)
    {
        $radiologyTest = RadiologyTest::findOrFail($id);
        $patients = Patient::all();
        return view('radiology.edit', compact('radiologyTest', 'patients'));
    }

    // Menyimpan pembaruan tes radiologi
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'exam_type' => 'required|string|max:255',
            'exam_result' => 'required|string',
            'exam_date' => 'required|date',
        ]);

        $radiologyTest = RadiologyTest::findOrFail($id);
        $radiologyTest->update($request->all());

        return redirect()->route('radiology.index');
    }

    // Menghapus tes radiologi
    public function destroy($id)
    {
        $radiologyTest = RadiologyTest::findOrFail($id);
        $radiologyTest->delete();

        return redirect()->route('radiology.index');
    }
}

