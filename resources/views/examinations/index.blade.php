@extends('adminlte::page')

@section('title', 'Daftar Pemeriksaan')

@section('content')
<div class="container-fluid">
    <h1>Daftar Pemeriksaan Pasien</h1>
    <a href="{{ url('/examinations/create') }}" class="btn btn-primary mb-3">Tambah Pemeriksaan Baru</a>

    <div class="card">
        <div class="card-body">
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Pasien</th>
                        <th>Jenis Pemeriksaan</th>
                        <th>Deskripsi</th>
                        <th>Tanggal</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($examinations as $examination)
                        <tr>
                            <td>{{ $examination->id }}</td>
                            <td>{{ $examination->patient->name }}</td>
                            <td>{{ $examination->examinationType->name }}</td>
                            <td>{{ $examination->description }}</td>
                            <td>{{ $examination->date }}</td>
                            <td>
                                <a href="{{ url('/examinations/'.$examination->id.'/edit') }}" class="btn btn-warning btn-sm">Edit</a>
                                <form action="{{ url('/examinations/'.$examination->id) }}" method="POST" style="display:inline;">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>
@endsection
