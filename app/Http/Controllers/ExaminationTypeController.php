<?php

namespace App\Http\Controllers;

use App\Models\ExaminationType;
use Illuminate\Http\Request;

class ExaminationTypeController extends Controller
{
    // Menampilkan daftar jenis pemeriksaan
    public function index()
    {
        $examinationTypes = ExaminationType::all();
        return view('examination_types.index', compact('examinationTypes'));
    }

    // Menampilkan form tambah jenis pemeriksaan
    public function create()
    {
        return view('examination_types.create');
    }

    // Menyimpan jenis pemeriksaan
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'description' => 'nullable|string',
        ]);

        ExaminationType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect()->route('examination_types.index');
    }
}
