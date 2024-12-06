@extends('adminlte::page')

@section('title', 'Tambah Rawat Inap')

@section('content_header')
    <h1>Tambah Rawat Inap</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-body">
            <form action="{{ route('inpatients.store') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label for="patient_id">Pasien</label>
                    <select name="patient_id" id="patient_id" class="form-control" required>
                        <option value="" disabled selected>Pilih Pasien</option>
                        @foreach($patients as $patient)
                            <option value="{{ $patient->id }}">{{ $patient->name }}</option>
                        @endforeach
                    </select>
                </div>
                
                <div class="form-group">
                    <label for="room_id">Kamar</label>
                    <select name="room_id" id="room_id" class="form-control" required>
                        <option value="" disabled selected>Pilih Kamar</option>
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="admission_date">Tanggal Masuk</label>
                    <input type="date" name="admission_date" id="admission_date" class="form-control" required>
                </div>

                <button type="submit" class="btn btn-primary">Tambah Rawat Inap</button>
            </form>
        </div>
    </div>
@stop
