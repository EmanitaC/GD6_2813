@extends('layouts.main')

@section('title', $konser->nama) {{-- DIUBAH --}}

@section('content')
<a href="{{ route('konser.index') }}" class="btn btn-outline-secondary mb-3">&larr; Kembali ke daftar</a>

<div class="card">
    <div class="card-body">
        <h1 class="card-title h3">{{ $konser->nama }}</h1> {{-- DIUBAH --}}
        <p class="text-muted mb-1">Promotor: {{ $konser->promotor->nama }}</p> {{-- BARU --}}
        <p class="text-muted mb-1">Kota: {{ $konser->kota }}</p>
        <p class="mb-1">Tanggal: {{ date('d-m-Y', strtotime($konser->tanggal)) }}</p> {{-- BARU --}}
        <p class="mb-1">Harga: Rp{{ number_format($konser->harga, 0, ',', '.') }}</p>
        <p class="mb-1">Sisa tiket: {{ $konser->sisa }}</p>

        @if (!empty($konser->deskripsi))
            <p class="mt-3"><strong>Deskripsi:</strong><br>{{ $konser->deskripsi }}</p>
        @endif
    </div>
</div>
@endsection