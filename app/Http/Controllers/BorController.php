<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class BorController extends Controller
{
    public function index()
{
    $totalBeds = Room::count();
    $occupiedBeds = Inpatient::whereNull('discharge_date')->count();
    $bor = ($occupiedBeds / $totalBeds) * 100;

    return view('bor.index', compact('bor'));
}

}
