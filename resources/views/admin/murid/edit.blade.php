@extends('layout.app')

@section('title','Edit Murid')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Edit Murid</h3>
        <p class="text-muted">Perbarui data murid</p>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <form action="{{ route('murid.update',$murid->id) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>NIS</label>
                    <input type="text"
                           name="nis"
                           class="form-control"
                           value="{{ $murid->nis }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text"
                           name="name"
                           class="form-control"
                           value="{{ $murid->user->name }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Email</label>
                    <input type="email"
                           name="email"
                           class="form-control"
                           value="{{ $murid->user->email }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              required>{{ $murid->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text"
                           name="no_telp"
                           class="form-control"
                           value="{{ $murid->no_telp }}"
                           required>
                </div>

                <div class="mb-3">
                    <label>Sabuk</label>
                    <select name="sabuk" class="form-control" required>
                        <option {{ $murid->sabuk == 'Putih' ? 'selected' : '' }}>Putih</option>
                        <option {{ $murid->sabuk == 'Kuning' ? 'selected' : '' }}>Kuning</option>
                        <option {{ $murid->sabuk == 'Hijau' ? 'selected' : '' }}>Hijau</option>
                        <option {{ $murid->sabuk == 'Biru' ? 'selected' : '' }}>Biru</option>
                        <option {{ $murid->sabuk == 'Merah' ? 'selected' : '' }}>Merah</option>
                        <option {{ $murid->sabuk == 'Hitam' ? 'selected' : '' }}>Hitam</option>
                    </select>
                </div>

                <div class="mb-3">
                    <label>Foto Sekarang</label><br>
                    <img src="{{ asset('storage/'.$murid->foto) }}"
                         width="80"
                         style="border-radius:8px;">
                </div>

                <div class="mb-3">
                    <label>Ganti Foto (opsional)</label>
                    <input type="file" name="foto" class="form-control">
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('murid.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection