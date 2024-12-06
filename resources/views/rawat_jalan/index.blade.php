@extends('adminlte::page')

@section('title', 'Daftar Rawat Jalan')

@section('content_header')
    <h1>Daftar Rawat Jalan</h1>
@endsection

@section('content')
<div class="container-fluid">
    <a href="{{ route('rawat-jalan.create') }}" class="btn btn-primary mb-3">
        <i class="fas fa-plus"></i> Tambah Rawat Jalan
    </a>

    <div class="table-responsive">
        <table class="table table-striped table-bordered">
            <thead class="thead-dark">
                <tr>
                    <th>Nama Pasien</th>
                    <th>Dokter</th>
                    <th>Tanggal Kunjungan</th>
                    <th>Keluhan</th>
                    <th>Diagnosis</th>
                    <th>Perawatan</th>
                    <th>Follow-up</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @foreach($rawatJalans as $rawatJalan)
                <tr>
                    <td>{{ $rawatJalan->patient->name }}</td>
                    <td>{{ $rawatJalan->doctor->name }}</td>
                    <td>{{ $rawatJalan->visit_date }}</td>
                    <td>{{ $rawatJalan->complaints }}</td>
                    <td>{{ $rawatJalan->diagnosis }}</td>
                    <td>{{ $rawatJalan->treatment_plan }}</td>
                    <td>{{ $rawatJalan->follow_up_date }}</td>
                    <td>
                        <a href="{{ route('rawat-jalan.edit', $rawatJalan->id) }}" class="btn btn-warning btn-sm">
                            <i class="fas fa-edit"></i> Edit
                        </a>
                        <form action="{{ route('rawat-jalan.destroy', $rawatJalan->id) }}" method="POST" style="display:inline;" onsubmit="return confirm('Apakah Anda yakin ingin menghapus data ini?')">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">
                                <i class="fas fa-trash"></i> Hapus
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection
