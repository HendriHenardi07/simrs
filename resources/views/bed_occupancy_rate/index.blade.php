@extends('adminlte::page')

@section('title', 'Bed Occupancy Rate (BOR)')

@section('content_header')
    <h1>Bed Occupancy Rate (BOR)</h1>
@stop

@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Daftar Bed Occupancy Rate</h3>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered">
                    <thead class="thead-dark">
                        <tr>
                            <th>Nama Kamar</th>
                            <th>Total Tempat Tidur</th>
                            <th>Tempat Tidur Terisi</th>
                            <th>Occupancy Rate (%)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($occupancyRates as $rate)
                            <tr>
                                <td>{{ $rate['room'] }}</td>
                                <td>{{ $rate['total_beds'] }}</td>
                                <td>{{ $rate['occupied_beds'] }}</td>
                                <td>
                                    <span class="badge 
                                        {{ $rate['occupancy_rate'] > 80 ? 'badge-danger' : ($rate['occupancy_rate'] > 50 ? 'badge-warning' : 'badge-success') }}">
                                        {{ $rate['occupancy_rate'] }}%
                                    </span>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="text-center">Tidak ada data tersedia.</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@stop
