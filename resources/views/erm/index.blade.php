@extends('adminlte::page')

@section('title', 'Daftar Rekam Medis')

@section('content')
<div class="container-fluid">
    <h1>Daftar Rekam Medis</h1>

    <!-- Link untuk menambah rekam medis -->
    <a href="{{ route('erm.create') }}" class="btn btn-primary mb-3">Tambah Rekam Medis</a>

    <table class="table table-striped mt-3">
        <thead>
            <tr>
                <th>Nama Pasien</th>
                <th>Pemeriksaan</th>
                <th>Diagnosis</th>
                <th>Perawatan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach($erms as $erm)
                <tr>
                    <td>{{ $erm->patient->name }}</td>
                    <td>{{ $erm->examination->description }}</td> <!-- Menampilkan nama pemeriksaan -->
                    <td>{{ $erm->diagnosis }}</td>
                    <td>{{ $erm->treatment }}</td>
                    <td>
                        <!-- Tombol untuk mengedit rekam medis -->
                        <a href="{{ route('erm.edit', $erm->id) }}" class="btn btn-warning btn-sm">Edit</a>

                        <!-- Form untuk menghapus rekam medis -->
                        <form action="{{ route('erm.destroy', $erm->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
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
@endsection
