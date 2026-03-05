@extends('layout.app')

@section('title','Tambah Pendaftar')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Tambah Pendaftar</h3>
        <p class="text-muted">Input data calon murid</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <form action="{{ route('pendaftar.store') }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>ID Pendaftar</label>
                    <input type="text" name="id_pendaftar" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text" name="nama" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Sekolah</label>
                    <input type="text" name="sekolah" class="form-control" required>
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

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control" required>
                        <option value="Pending">Pending</option>
                        <option value="Diterima">Diterima</option>
                        <option value="Ditolak">Ditolak</option>
                    </select>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection