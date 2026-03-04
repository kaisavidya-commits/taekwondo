@extends('layout.app')

@section('title','Tambah Admin')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Tambah Admin</h3>
        <p class="text-muted">Buat akun admin baru</p>
    </div>

    <div class="stats-card">
        <form action="{{ route('admin.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label>Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label>Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <button class="btn btn-primary">Simpan</button>
            <a href="{{ route('admin.index') }}" class="btn btn-secondary">Kembali</a>
        </form>
    </div>

</div>

@endsection