@extends('adminlte::page')

@section('title', 'Tambah Pemeriksaan')

@section('content')
<div class="container-fluid">
    <h1>Tambah Pemeriksaan Baru</h1>

    <div class="card">
        <div class="card-body">
            <form action="{{ url('/examinations') }}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="patient_id">Pasien:</label>
                    <select name="patient_id" id="patient_id" class="form-control">
                        @foreach ($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="examination_type_id">Jenis Pemeriksaan:</label>
                    <select name="examination_type_id" id="examination_type_id" class="form-control">
                        @foreach ($examinationTypes as $examinationType)
                            <option value="{{ $examinationType->id }}">{{ $examinationType->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="description">Deskripsi:</label>
                    <textarea name="description" id="description" class="form-control" rows="4"></textarea>
                </div>

                <div class="form-group">
                    <label for="date">Tanggal:</label>
                    <input type="date" name="date" id="date" class="form-control">
                </div>

                <button type="submit" class="btn btn-primary">Simpan Pemeriksaan</button>
            </form>
        </div>
    </div>
</div>
@endsection
