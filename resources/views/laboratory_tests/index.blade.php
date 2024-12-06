@extends('adminlte::page')

@section('title', 'Daftar Pemeriksaan Laboratorium')

@section('content_header')
    <h1>Daftar Pemeriksaan Laboratorium</h1>
@stop

@section('content')
    <a href="{{ route('laboratory_tests.create') }}" class="btn btn-primary mb-3">Tambah Pemeriksaan Laboratorium</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pemeriksaan Laboratorium</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Jenis Pemeriksaan</th>
                            <th>Hasil</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($tests as $test)
                            <tr>
                                <td>{{ $test->patient->name }}</td>
                                <td>{{ $test->examination->description }}</td>
                                <td>{{ $test->result }}</td>
                                <td>{{ $test->test_date->format('d-m-Y') }}</td> <!-- Format tanggal -->
                                <td>
                                    <a href="{{ route('laboratory_tests.edit', $test->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('laboratory_tests.destroy', $test->id) }}" method="POST" style="display:inline;">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin menghapus?')">Hapus</button>
                                    </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
