@extends('layout.app')

@section('title','Tambah Murid')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Tambah Murid</h3>
        <p class="text-muted">Daftarkan murid baru Taekwondo</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <form action="{{ route('murid.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="mb-3">
                    <label>ID Murid</label>
                    <input type="text" name="id_murid" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text" name="nis" class="form-control" required>
                </div>

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

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat" class="form-control" required></textarea>
                </div>

                <div class="mb-3">
                    <label>Tanggal Lahir</label>
                    <input type="date" name="tgl_lahir" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text" name="no_telp" class="form-control" required>
                </div>

                <div class="mb-3">
                    <label>Sabuk</label>
                    <select name="sabuk" class="form-control" required>
                        <option value="">-- Pilih Sabuk --</option>
                        <option value="Putih">Putih</option>
                        <option value="Kuning">Kuning</option>
                        <option value="Hijau">Hijau</option>
                        <option value="Biru">Biru</option>
                        <option value="Merah">Merah</option>
                        <option value="Hitam">Hitam</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Foto</label>
                    <input type="file" name="foto" class="form-control" required>
                </div>

                <button class="btn btn-primary">Simpan</button>
                <a href="{{ route('murid.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection