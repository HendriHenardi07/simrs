@extends('layouts.app')

@section('content')
    <h1>Welcome to the Dashboard</h1>
    <div class="row">
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-info"><i class="fas fa-users"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Patients</span>
                    <span class="info-box-number">{{ $patientsCount }}</span>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="info-box">
                <span class="info-box-icon bg-success"><i class="fas fa-clipboard"></i></span>
                <div class="info-box-content">
                    <span class="info-box-text">Examinations</span>
                    <span class="info-box-number">{{ $examinationsCount }}</span>
                </div>
            </div>
        </div>
    </div>
@endsection
