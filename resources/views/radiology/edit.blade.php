@extends('adminlte::page')

@section('title', 'Edit Tes Radiologi')

@section('content_header')
    <h1>Edit Tes Radiologi</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulir Edit Tes Radiologi</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('radiology.update', $radiologyTest->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="form-group">
                    <label for="patient_id">Pasien</label>
                    <select name="patient_id" id="patient_id" class="form-control" required>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}" {{ $patient->id == $radiologyTest->patient_id ? 'selected' : '' }}>
                                {{ $patient->name }}
                            </option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="exam_type">Jenis Pemeriksaan</label>
                    <input type="text" name="exam_type" id="exam_type" class="form-control" value="{{ $radiologyTest->exam_type }}" required>
                </div>

                <div class="form-group">
                    <label for="exam_result">Hasil Pemeriksaan</label>
                    <textarea name="exam_result" id="exam_result" class="form-control" rows="4" required>{{ $radiologyTest->exam_result }}</textarea>
                </div>

                <div class="form-group">
                    <label for="exam_date">Tanggal Pemeriksaan</label>
                    <input type="date" name="exam_date" id="exam_date" class="form-control" value="{{ $radiologyTest->exam_date }}" required>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Update Tes Radiologi</button>
            </form>
        </div>
    </div>
@stop
