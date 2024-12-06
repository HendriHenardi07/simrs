@extends('adminlte::page')

@section('title', 'Daftar Pasien IGD')

@section('content_header')
    <h1>Daftar Pasien IGD</h1>
@stop

@section('content')
    <a href="{{ route('hospital_emergency.create') }}" class="btn btn-primary mb-3">Tambah Pasien IGD</a>

    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Data Pasien IGD</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered table-striped">
                    <thead class="thead-dark">
                        <tr>
                            <th>Pasien</th>
                            <th>Gejala</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($emergencies as $emergency)
                            <tr>
                                <td>{{ $emergency->patient->name }}</td>
                                <td>{{ $emergency->symptoms }}</td>
                                <td>{{ $emergency->status }}</td>
                                <td>
                                    @if($emergency->status == 'Waiting')
                                        <form action="{{ route('hospital_emergency.update_status', ['hospitalEmergency' => $emergency->id, 'status' => 'In Treatment']) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-warning btn-sm">Mulai Perawatan</button>
                                        </form>
                                    @endif

                                    @if($emergency->status == 'In Treatment')
                                        <form action="{{ route('hospital_emergency.update_status', ['hospitalEmergency' => $emergency->id, 'status' => 'Transferred to Inpatient']) }}" method="POST" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-info btn-sm">Pindah ke Rawat Inap</button>
                                        </form>
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
