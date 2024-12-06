@extends('adminlte::page')

@section('title', 'Tambah Tes Radiologi')

@section('content_header')
    <h1>Tambah Tes Radiologi</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulir Tambah Tes Radiologi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('radiology.store') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="patient_id">Pasien</label>
                    <select name="patient_id" id="patient_id" class="form-control" required>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exam_type">Jenis Pemeriksaan</label>
                    <input type="text" name="exam_type" id="exam_type" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="exam_result">Hasil Pemeriksaan</label>
                    <textarea name="exam_result" id="exam_result" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="exam_date">Tanggal Pemeriksaan</label>
                    <input type="date" name="exam_date" id="exam_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan Tes Radiologi</button>
            </form>
        </div>
    </div>
@stop
