@extends('layout.app')

@section('title', 'Halaman Tidak Ditemukan')

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 60vh;">
    <div class="text-center">
        <h1 class="fw-bold" style="font-size: 80px; color: #8b1e1e;">404</h1>
        <h4 class="fw-semibold mb-2">Halaman Tidak Ditemukan</h4>
        <p class="text-muted mb-4">Halaman yang kamu cari tidak ada atau sudah dipindahkan.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>
@endsection