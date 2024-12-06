@extends('adminlte::page')

@section('title', 'Edit Pemeriksaan Laboratorium')

@section('content_header')
    <h1>Edit Pemeriksaan Laboratorium</h1>
@stop

@section('content')
    <form action="{{ route('laboratory_tests.update', $test->id) }}" method="POST">
        @csrf
        @method('PUT')
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Formulir Edit Pemeriksaan Laboratorium</h3>
            </div>
            <div class="card-body">
                <div class="form-group">
                    <label for="patient_id">Nama Pasien</label>
                    <select name="patient_id" id="patient_id" class="form-control" required>
                        <option value="">Pilih Pasien</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $patient->id == $test->patient_id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="examination_id">Pemeriksaan</label>
                    <select name="examination_id" id="examination_id" class="form-control" required>
                        <option value="">Pilih Pemeriksaan</option>
                        @foreach($examinations as $examination)
                            <option value="{{ $examination->id }}" {{ $examination->id == $test->examination_id ? 'selected' : '' }}>
                                {{ $examination->description }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="result">Hasil Pemeriksaan</label>
                    <textarea name="result" id="result" class="form-control" required>{{ $test->result }}</textarea>
                </div>

                <div class="form-group">
                    <label for="test_date">Tanggal Pemeriksaan</label>
                    <input type="date" name="test_date" id="test_date" class="form-control" value="{{ $test->test_date }}" required>
                </div>
            </div>
            <div class="card-footer">
                <button type="submit" class="btn btn-primary">Update Pemeriksaan</button>
            </div>
        </div>
    </form>
@stop
