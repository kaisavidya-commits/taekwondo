@extends('layouts.app')

@section('content')
<div class="container">
    <h3>Sign Up Siswa</h3>

    @if(session('error'))
        <div class="alert alert-danger">{{ session('error') }}</div>
    @endif

    <form method="POST" action="{{ route('signup.siswa') }}">
        @csrf

        <input type="number" name="id_pendaftar" placeholder="ID Pendaftar" required><br><br>

        <input type="text" name="nama" placeholder="Nama Lengkap" required><br><br>

        <input type="email" name="email" placeholder="Email" required><br><br>

        <input type="password" name="password" placeholder="Password" required><br><br>

        <input type="password" name="password_confirmation" placeholder="Konfirmasi Password" required><br><br>

        <button type="submit">Daftar Akun</button>
    </form>
</div>
@endsection