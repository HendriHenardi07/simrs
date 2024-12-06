@extends('adminlte::page')

@section('title', 'Daftar Tes Radiologi')

@section('content_header')
    <h1>Daftar Tes Radiologi</h1>
@stop

@section('content')
    <a href="{{ route('radiology.create') }}" class="btn btn-primary mb-3">Tambah Tes Radiologi</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Tes Radiologi</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Pasien</th>
                            <th>Jenis Pemeriksaan</th>
                            <th>Hasil Pemeriksaan</th>
                            <th>Tanggal Pemeriksaan</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($radiologyTests as $test)
                            <tr>
                                <td>{{ $test->patient->name }}</td>
                                <td>{{ $test->exam_type }}</td>
                                <td>{{ $test->exam_result }}</td>
                                <td>{{ \Carbon\Carbon::parse($test->exam_date)->format('d-m-Y') }}</td> <!-- Format tanggal -->
                                <td>
                                    <a href="{{ route('radiology.edit', $test->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                    <form action="{{ route('radiology.destroy', $test->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus?')">
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
@stop
