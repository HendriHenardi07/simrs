@extends('adminlte::page')

@section('title', 'Edit Rawat Jalan')

@section('content_header')
    <h1>Edit Rawat Jalan</h1>
@endsection

@section('content')
<div class="container-fluid">
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Form Edit Rawat Jalan</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('rawat-jalan.update', $rawatJalan->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="patient_id">Pasien</label>
                    <select name="patient_id" id="patient_id" class="form-control select2" style="width: 100%;">
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $patient->id == $rawatJalan->patient_id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="doctor_id">Dokter</label>
                    <select name="doctor_id" id="doctor_id" class="form-control select2" style="width: 100%;">
                        @foreach($doctors as $doctor)
                            <option value="{{ $doctor->id }}" {{ $doctor->id == $rawatJalan->doctor_id ? 'selected' : '' }}>
                                {{ $doctor->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="visit_date">Tanggal Kunjungan</label>
                    <input type="date" name="visit_date" id="visit_date" class="form-control" value="{{ $rawatJalan->visit_date }}" required>
                </div>

                <div class="form-group">
                    <label for="complaints">Keluhan</label>
                    <textarea name="complaints" id="complaints" class="form-control" rows="3" required>{{ $rawatJalan->complaints }}</textarea>
                </div>

                <div class="form-group">
                    <label for="diagnosis">Diagnosis</label>
                    <textarea name="diagnosis" id="diagnosis" class="form-control" rows="3" required>{{ $rawatJalan->diagnosis }}</textarea>
                </div>

                <div class="form-group">
                    <label for="treatment_plan">Rencana Perawatan</label>
                    <textarea name="treatment_plan" id="treatment_plan" class="form-control" rows="3" required>{{ $rawatJalan->treatment_plan }}</textarea>
                </div>

                <div class="form-group">
                    <label for="follow_up_date">Tanggal Follow-up</label>
                    <input type="date" name="follow_up_date" id="follow_up_date" class="form-control" value="{{ $rawatJalan->follow_up_date }}">
                </div>

                <button type="submit" class="btn btn-primary">
                    <i class="fas fa-save"></i> Update Data
                </button>
                <a href="{{ route('rawat-jalan.index') }}" class="btn btn-secondary">
                    <i class="fas fa-arrow-left"></i> Kembali
                </a>
            </form>
        </div>
    </div>
</div>
@endsection
