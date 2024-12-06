<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class OutpatientController extends Controller
{
    public function create()
{
    $patients = Patient::all();
    $doctors = Doctor::all();
    return view('outpatient.create', compact('patients', 'doctors'));
}

public function store(Request $request)
{
    $request->validate([
        'patient_id' => 'required|exists:patients,id',
        'date_of_visit' => 'required|date',
        'diagnosis' => 'required|string',
        'treatment' => 'required|string',
        'doctor_id' => 'required|exists:doctors,id',
    ]);

    Outpatient::create($request->all());
    return redirect()->route('outpatient.index');
}

public function index()
{
    $outpatients = Outpatient::with('patient', 'doctor')->get();
    return view('outpatient.index', compact('outpatients'));
}

}
