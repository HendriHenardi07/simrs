<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PatientController;
use App\Http\Controllers\ExaminationController;
use App\Http\Controllers\InpatientController;
use App\Http\Controllers\RoomController;
use App\Http\Controllers\HospitalEmergencyController;
use App\Http\Controllers\BedOccupancyRateController;
use App\Http\Controllers\ErmController;
use App\Http\Controllers\ExaminationTypeController;
use App\Http\Controllers\LaboratoryTestController;
use App\Http\Controllers\RawatJalanController;
use App\Http\Controllers\RadiologyTestController;

// Halaman utama

Route::get('/', function () {
    return redirect()->route('dashboard');
});


Route::get('/dashboard', function () {
    $patientsCount = App\Models\Patient::count();
    $examinationsCount = App\Models\Examination::count();
    return view('dashboard', compact('patientsCount', 'examinationsCount'));
})->name('dashboard');



// Rute untuk modul Patient
Route::prefix('patients')->name('patients.')->group(function () {
    Route::get('/', [PatientController::class, 'index'])->name('index');
    Route::get('/create', [PatientController::class, 'create'])->name('create');
    Route::post('/', [PatientController::class, 'store'])->name('store');
    Route::get('/{id}/edit', [PatientController::class, 'edit'])->name('edit');
    Route::put('/{id}', [PatientController::class, 'update'])->name('update');
    Route::delete('/{id}', [PatientController::class, 'destroy'])->name('destroy');
});

// Rute untuk modul Examination
Route::prefix('examinations')->name('examinations.')->group(function () {
    Route::get('/', [ExaminationController::class, 'index'])->name('index');
    Route::get('/create', [ExaminationController::class, 'create'])->name('create');
    Route::post('/', [ExaminationController::class, 'store'])->name('store');
});

// Rute untuk modul Inpatient
Route::prefix('inpatients')->name('inpatients.')->group(function () {
    // Rute untuk menampilkan daftar rawat inap
    Route::get('/', [InpatientController::class, 'index'])->name('index');
    // Rute untuk menyimpan data rawat inap
    Route::post('/', [InpatientController::class, 'store'])->name('store');
    // Rute untuk menambahkan rawat inap (create)
    Route::get('/create', [InpatientController::class, 'create'])->name('create');
    // Rute untuk discharge pasien
    Route::put('/{inpatient}/discharge', [InpatientController::class, 'discharge'])->name('discharge');
});

// Rute untuk modul Room
Route::get('rooms/available', [RoomController::class, 'index'])->name('rooms.available');

// Rute untuk modul Hospital Emergency
Route::resource('hospital_emergency', HospitalEmergencyController::class);
Route::post('/hospital_emergency/{hospitalEmergency}/update_status/{status}', [HospitalEmergencyController::class, 'updateStatus'])->name('hospital_emergency.update_status');

// Rute untuk modul Bed Occupancy Rate (BOR)
Route::get('bed-occupancy-rate', [BedOccupancyRateController::class, 'index'])->name('bed-occupancy-rate.index');

// Rute untuk modul eRm
Route::prefix('erms')->name('erm.')->group(function () {
    Route::get('/', [ErmController::class, 'index'])->name('index');
    Route::get('/create', [ErmController::class, 'create'])->name('create');
    Route::post('/', [ErmController::class, 'store'])->name('store');
    Route::get('/{erm}/edit', [ErmController::class, 'edit'])->name('edit');
    Route::put('/{erm}', [ErmController::class, 'update'])->name('update');
    Route::delete('/{erm}', [ErmController::class, 'destroy'])->name('destroy');
});

// Rute untuk modul Examination Type
Route::prefix('examination_types')->name('examination_types.')->group(function () {
    Route::get('/', [ExaminationTypeController::class, 'index'])->name('index');
    Route::get('/create', [ExaminationTypeController::class, 'create'])->name('create');
    Route::post('/', [ExaminationTypeController::class, 'store'])->name('store');
});

// Rute untuk modul Laboratory Tests
Route::resource('laboratory_tests', LaboratoryTestController::class);

// Rute untuk modul Rawat Jalan
Route::prefix('rawat-jalan')->name('rawat-jalan.')->group(function() {
    // Menampilkan daftar rawat jalan
    Route::get('/', [RawatJalanController::class, 'index'])->name('index');
    // Menampilkan form tambah rawat jalan
    Route::get('/create', [RawatJalanController::class, 'create'])->name('create');
    // Menyimpan data rawat jalan
    Route::post('/', [RawatJalanController::class, 'store'])->name('store');
    // Menampilkan form edit rawat jalan
    Route::get('/{id}/edit', [RawatJalanController::class, 'edit'])->name('edit');
    // Menyimpan pembaruan data rawat jalan
    Route::put('/{id}', [RawatJalanController::class, 'update'])->name('update');
    // Menghapus data rawat jalan
    Route::delete('/{id}', [RawatJalanController::class, 'destroy'])->name('destroy');
});

// Rute untuk modul Radiology
Route::prefix('radiology')->name('radiology.')->group(function() {
    // Menampilkan daftar tes radiologi
    Route::get('/', [RadiologyTestController::class, 'index'])->name('index');
    // Menampilkan form tambah tes radiologi
    Route::get('/create', [RadiologyTestController::class, 'create'])->name('create');
    // Menyimpan data tes radiologi
    Route::post('/', [RadiologyTestController::class, 'store'])->name('store');
    // Menampilkan form edit tes radiologi
    Route::get('/{id}/edit', [RadiologyTestController::class, 'edit'])->name('edit');
    // Menyimpan pembaruan data tes radiologi
    Route::put('/{id}', [RadiologyTestController::class, 'update'])->name('update');
    // Menghapus data tes radiologi
    Route::delete('/{id}', [RadiologyTestController::class, 'destroy'])->name('destroy');
});

