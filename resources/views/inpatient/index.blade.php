@extends('adminlte::page')

@section('title', 'Daftar Rawat Inap')

@section('content_header')
    <h1>Daftar Rawat Inap</h1>
@stop

@section('content')
    <a href="{{ route('inpatients.create') }}" class="btn btn-primary mb-3">Tambah Rawat Inap</a>

    <div class="table-responsive">
        <table class="table table-bordered table-striped">
            <thead class="thead-dark">
                <tr>
                    <th>Pasien</th>
                    <th>Kamar</th>
                    <th>Tanggal Masuk</th>
                    <th>Tanggal Keluar</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($inpatients as $inpatient)
                    <tr>
                        <td>{{ $inpatient->patient->name }}</td>
                        <td>{{ $inpatient->room->name }}</td>
                        <td>{{ $inpatient->admission_date->format('d-m-Y') }}</td>
                        <td>
                            {{ $inpatient->discharge_date ? $inpatient->discharge_date->format('d-m-Y') : 'Belum Keluar' }}
                        </td>
                        <td>
                            <span class="badge {{ $inpatient->status === 'Masih dirawat' ? 'badge-success' : 'badge-secondary' }}">
                                {{ $inpatient->status }}
                            </span>
                        </td>
                        <td>
                            @if($inpatient->status === 'Masih dirawat')
                                <form action="{{ route('inpatients.discharge', $inpatient->id) }}" method="POST" style="display: inline;">
                                    @csrf
                                    @method('PUT')
                                    <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda yakin ingin memulangkan pasien ini?')">
                                        Pulangkan
                                    </button>
                                </form>
                            @else
                                <span class="text-muted">Tidak ada aksi</span>
                            @endif
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="text-center">Belum ada data rawat inap.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>
@stop
