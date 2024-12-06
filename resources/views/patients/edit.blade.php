@extends('adminlte::page')

@section('title', 'Edit Pasien')

@section('content_header')
    <h1>Edit Pasien</h1>
@stop

@section('content')
    <form action="{{ route('patients.update', $patient->id) }}" method="POST">
        @csrf
        @method('PUT')
        
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" class="form-control" value="{{ old('name', $patient->name) }}" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" class="form-control" value="{{ old('gender', $patient->gender) }}" required>
        </div>

        <div class="form-group">
            <label for="dob">Tanggal Lahir:</label>
            <input type="date" id="dob" name="dob" class="form-control" value="{{ old('dob', $patient->dob) }}" required>
        </div>

        <div class="form-group">
            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" class="form-control" value="{{ old('address', $patient->address) }}" required>
        </div>

        <div class="form-group">
            <label for="phone">Nomor Telepon:</label>
            <input type="text" id="phone" name="phone" class="form-control" value="{{ old('phone', $patient->phone) }}" required>
        </div>

        <button type="submit" class="btn btn-primary mt-3">Update</button>
    </form>

    <a href="{{ route('patients.index') }}" class="btn btn-secondary mt-3">Kembali ke Daftar Pasien</a>
@stop
