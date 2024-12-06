@extends('adminlte::page')

@section('title', 'Tambah Pasien IGD')

@section('content_header')
    <h1>Tambah Pasien IGD</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Formulir Tambah Pasien IGD</h3>
        </div>
        <div class="card-body">
            <form action="{{ route('hospital_emergency.store') }}" method="POST">
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
                    <label for="arrival_time">Waktu Kedatangan</label>
                    <input type="datetime-local" name="arrival_time" class="form-control" required>
                </div>

                <div class="form-group">
                    <label for="symptoms">Gejala</label>
                    <textarea name="symptoms" id="symptoms" class="form-control" rows="4" required></textarea>
                </div>

                <div class="form-group">
                    <label for="room_id">Pilih Kamar</label>
                    <select name="room_id" id="room_id" class="form-control">
                        @foreach($rooms as $room)
                            <option value="{{ $room->id }}">{{ $room->name }}</option>
                        @endforeach
                    </select>
                </div>

                <button type="submit" class="btn btn-primary mt-3">Simpan</button>
            </form>
        </div>
    </div>
@stop
