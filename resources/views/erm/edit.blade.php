@extends('adminlte::page')

@section('title', 'Edit Rekam Medis')

@section('content')
<div class="container-fluid">
    <h1>Edit Rekam Medis</h1>

    <form action="{{ route('erm.update', $erm->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="patient_id">Nama Pasien</label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}" {{ $patient->id == $erm->patient_id ? 'selected' : '' }}>
                        {{ $patient->name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="examination_id">Pemeriksaan</label>
            <select name="examination_id" id="examination_id" class="form-control">
                @foreach($examinations as $examination)
                    <option value="{{ $examination->id }}" {{ $examination->id == $erm->examination_id ? 'selected' : '' }}>
                        {{ $examination->description }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Menghapus bagian examination_type_id karena sudah tidak ada lagi -->
        
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <input type="text" name="diagnosis" id="diagnosis" class="form-control" value="{{ $erm->diagnosis }}">
        </div>

        <div class="form-group">
            <label for="treatment">Perawatan</label>
            <input type="text" name="treatment" id="treatment" class="form-control" value="{{ $erm->treatment }}">
        </div>

        <button type="submit" class="btn btn-primary">Update Rekam Medis</button>
    </form>
</div>
@endsection
