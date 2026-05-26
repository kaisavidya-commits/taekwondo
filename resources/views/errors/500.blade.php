@extends('layout.app')

@section('title', 'Terjadi Kesalahan')

@section('content')
<div class="container d-flex flex-column align-items-center justify-content-center" style="min-height: 60vh;">
    <div class="text-center">
        <h1 class="fw-bold" style="font-size: 80px; color: #8b1e1e;">500</h1>
        <h4 class="fw-semibold mb-2">Terjadi Kesalahan Server</h4>
        <p class="text-muted mb-4">Maaf, ada yang tidak beres di sistem kami. Silakan coba lagi.</p>
        <a href="{{ url('/') }}" class="btn btn-primary">Kembali ke Beranda</a>
    </div>
</div>
@endsection