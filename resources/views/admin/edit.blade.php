@extends('layouts.app')

@section('title', 'Edit Guru')

@section('content')
<div class="container">
    <h2>Edit Guru</h2>

    <form action="{{ route('guru.update', $guru->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label>Nama</label>
            <input type="text" name="nama" value="{{ $guru->nama }}" class="form-control">
        </div>

        <div class="mb-3">
            <label>NIP</label>
            <input type="text" name="nip" value="{{ $guru->nip }}" class="form-control">
        </div>

        <button type="submit" class="btn btn-success">Update</button>
        <a href="{{ route('guru.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>
@endsection