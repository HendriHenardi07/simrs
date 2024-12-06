@extends('adminlte::page')

@section('title', 'Tambah Pasien')

@section('content_header')
    <h1>Tambah Pasien Baru</h1>
@stop

@section('content')
    <form action="{{ route('patients.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama:</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="gender">Gender:</label>
            <input type="text" id="gender" name="gender" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="dob">Tanggal Lahir:</label>
            <input type="date" id="dob" name="dob" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="address">Alamat:</label>
            <input type="text" id="address" name="address" class="form-control" required>
        </div>

        <div class="form-group">
            <label for="phone">Nomor Telepon:</label>
            <input type="text" id="phone" name="phone" class="form-control" required>
        </div>

        <button type="submit" class="btn btn-success mt-3">Simpan</button>
    </form>
@stop
