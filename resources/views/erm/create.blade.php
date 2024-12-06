@extends('adminlte::page')

@section('title', 'Tambah Rekam Medis')

@section('content')
<div class="container-fluid">
    <h1>Tambah Rekam Medis</h1>

    <form action="{{ route('erm.store') }}" method="POST">
        @csrf

        <div class="form-group">
            <label for="patient_id">Pasien</label>
            <select name="patient_id" id="patient_id" class="form-control">
                @foreach($patients as $patient)
                    <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="examination_id">Pemeriksaan</label>
            <select name="examination_id" id="examination_id" class="form-control">
                @foreach($examinations as $examination)
                    <option value="{{ $examination->id }}">
                        {{ $examination->description }}
                    </option>
                @endforeach
            </select>
        </div>

        <!-- Menghapus bagian examination_type_id karena sudah tidak ada lagi dalam tabel -->
        
        <div class="form-group">
            <label for="diagnosis">Diagnosis</label>
            <input type="text" name="diagnosis" id="diagnosis" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="treatment">Perawatan</label>
            <input type="text" name="treatment" id="treatment" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Simpan Rekam Medis</button>
    </form>
</div>
@endsection
