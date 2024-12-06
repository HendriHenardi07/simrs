<?php

namespace App\Http\Controllers;

use App\Models\Patient;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    // Menampilkan form create pasien
    public function create()
    {
        return view('patients.create');
    }

    // Menyimpan data pasien
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        $patient = Patient::create($validated);

        return redirect('/patients');
    }

    // Menampilkan daftar pasien
    public function index()
    {
        $patients = Patient::all();
        return view('patients.index', compact('patients'));
    }

    // Menampilkan form edit pasien
    public function edit($id)
    {
        $patient = Patient::findOrFail($id);
        return view('patients.edit', compact('patient'));
    }

    // Menyimpan perubahan data pasien
    public function update(Request $request, $id)
    {
        $patient = Patient::findOrFail($id);

        // Validasi input
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'gender' => 'required|string|max:10',
            'dob' => 'required|date',
            'address' => 'required|string|max:255',
            'phone' => 'required|string|max:15',
        ]);

        // Update data pasien
        $patient->update($validated);

        return redirect('/patients');
    }

    // Menghapus pasien
    public function destroy($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();  // Menghapus pasien dari database

        return redirect('/patients');  // Redirect ke daftar pasien setelah dihapus
    }
}
