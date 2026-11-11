@extends('layouts.main')

@section('title', 'Beranda')

@section('content')
<img src="{{ asset('images/banner.jpg') }}" class="img-fluid rounded mb-4" alt="Banner konser TiketWar">

<div class="hero text-center mb-4">
    <h1 class="display-5 fw-bold">Selamat Datang di TiketWar</h1>
    <p class="lead">Tempat war tiket konser paling gercep!</p>
    <a href="{{ route('konser.index') }}" class="btn btn-light btn-lg">Lihat Daftar Konser</a>
</div>

<div class="row text-center my-4">
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="display-6 fw-bold text-primary">{{ $jumlahKonser }}</div>
                <div class="text-muted">Jumlah Konser</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="display-6 fw-bold text-success">{{ $jumlahPromotor }}</div>
                <div class="text-muted">Jumlah Promotor</div>
            </div>
        </div>
    </div>
    <div class="col-md-4 mb-3">
        <div class="card shadow-sm">
            <div class="card-body">
                <div class="display-6 fw-bold text-warning">{{ $totalSisa }}</div>
                <div class="text-muted">Total Sisa Tiket</div>
            </div>
        </div>
    </div>
</div>
@endsection