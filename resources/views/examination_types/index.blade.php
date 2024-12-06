@extends('adminlte::page')

@section('title', 'Daftar Jenis Pemeriksaan')

@section('content')
<div class="container-fluid">
    <h1>Daftar Jenis Pemeriksaan</h1>

    <!-- Tombol untuk menambah jenis pemeriksaan -->
    <a href="{{ route('examination_types.create') }}" class="btn btn-primary mb-3">Tambah Jenis Pemeriksaan</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Nama Jenis Pemeriksaan</th>
                        <th>Deskripsi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($examinationTypes as $type)
                        <tr>
                            <td>{{ $type->name }}</td>
                            <td>{{ $type->description }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
