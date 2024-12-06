<?php

namespace App\Http\Controllers;

use App\Models\LaboratoryTest;
use App\Models\Patient;
use App\Models\Examination;
use Illuminate\Http\Request;

class LaboratoryTestController extends Controller
{
    // Menampilkan daftar hasil pemeriksaan laboratorium
    public function index()
    {
        $tests = LaboratoryTest::with('patient', 'examination')->get();
        return view('laboratory_tests.index', compact('tests'));
    }

    // Menampilkan form untuk menambah pemeriksaan laboratorium
    public function create()
    {
        $patients = Patient::all();
        $examinations = Examination::all(); // Pastikan relasi jenis pemeriksaan dimuat
        return view('laboratory_tests.create', compact('patients', 'examinations'));
    }

    // Menyimpan pemeriksaan laboratorium
    public function store(Request $request)
    {
        $validated = $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'examination_id' => 'required|exists:examinations,id',
            'result' => 'required|string|max:255',
            'test_date' => 'required|date',
        ]);

        LaboratoryTest::create($validated);

        return redirect()->route('laboratory_tests.index');
    }

    // Menampilkan form untuk mengedit pemeriksaan laboratorium
    public function edit($id)
    {
        $test = LaboratoryTest::findOrFail($id);
        $patients = Patient::all();
        $examinations = Examination::all();
        return view('laboratory_tests.edit', compact('test', 'patients', 'examinations'));
    }

    // Menyimpan pembaruan pemeriksaan laboratorium
    public function update(Request $request, $id)
    {
        $request->validate([
            'patient_id' => 'required|exists:patients,id',
            'examination_id' => 'required|exists:examinations,id',
            'result' => 'required|string|max:255',
            'test_date' => 'required|date',
        ]);

        $test = LaboratoryTest::findOrFail($id);
        $test->update($request->all());

        return redirect()->route('laboratory_tests.index');
    }

    // Menghapus pemeriksaan laboratorium
    public function destroy($id)
    {
        $test = LaboratoryTest::findOrFail($id);
        $test->delete();

        return redirect()->route('laboratory_tests.index');
    }
}

