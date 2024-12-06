@extends('adminlte::page')

@section('title', 'Tambah Pemeriksaan Laboratorium')

@section('content_header')
    <h1>Tambah Pemeriksaan Laboratorium</h1>
@stop

@section('content')
    <form action="{{ route('laboratory_tests.store') }}" method="POST">
        @csrf
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Formulir Pemeriksaan Laboratorium</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="patient_id">Nama Pasien</label>
                    <select name="patient_id" id="patient_id" class="form-control" required>
                        <option value="">Pilih Pasien</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="examination_id">Pemeriksaan</label>
                    <select name="examination_id" id="examination_id" class="form-control" required>
                        <option value="">Pilih Pemeriksaan</option>
                        @foreach($examinations as $examination)
                            <option value="{{ $examination->id }}">{{ $examination->description }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="result">Hasil Pemeriksaan</label>
                    <textarea name="result" id="result" class="form-control" required></textarea>
                </div>

                <div class="form-group">
                    <label for="test_date">Tanggal Pemeriksaan</label>
                    <input type="date" name="test_date" id="test_date" class="form-control" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
            </div>
        </div>
    </form>
@stop
