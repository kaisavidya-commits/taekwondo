@extends('layout.app')

@section('title','Tambah Pendaftar')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Form Pendaftaran</h3>
        <p class="text-muted">Input data calon murid</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            @if($errors->any())
                <div class="alert alert-danger">
                    <ul class="mb-0">
                        @foreach($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <form action="{{ route('pendaftar.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" value="{{ old('nama') }}" required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                </div>

                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" value="{{ old('no_telp') }}" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir') }}" required>
                </div>

                <div class="mb-3">
                    <label>Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" value="{{ old('sekolah') }}" required>
                </div>

                <div class="mb-3">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Upload Akte</label>
                    <input type="file" name="akte" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Upload KK</label>
                    <input type="file" name="kk" class="form-control" required>
                </div>

                <button class="btn btn-primary">Daftar</button>
                <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection