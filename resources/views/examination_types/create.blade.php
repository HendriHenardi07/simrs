@extends('adminlte::page')

@section('title', 'Tambah Jenis Pemeriksaan')

@section('content')
<div class="container-fluid">
    <h1>Tambah Jenis Pemeriksaan</h1>

    <form action="{{ route('examination_types.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="name">Nama Jenis Pemeriksaan</label>
            <input type="text" id="name" name="name" class="form-control" required>
        </div>
        
        <div class="form-group">
            <label for="description">Deskripsi</label>
            <textarea id="description" name="description" class="form-control"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
</div>
@endsection
