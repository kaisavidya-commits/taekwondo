@extends('layout.app')

@section('title', 'Akses Ditolak')

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 60vh;">
    <div class="text-center">
        <h1 class="fw-bold" style="font-size: 80px; color: #8b1e1e;">403</h1>
        <h4 class="fw-semibold mb-2">Akses Ditolak</h4>
        <p class="text-muted mb-4">Kamu tidak punya izin untuk mengakses halaman ini.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>
@endsection