@extends('layout.app')

@section('title','Edit Pendaftar')

@section('content')

<div class="container-fluid">

    <div class="mb-4">
        <h3 class="fw-bold">Edit Pendaftar</h3>
    </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
<form action="{{ route('pendaftar.update', $pendaftar) }}"
                  method="POST"
                  enctype="multipart/form-data">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Nama</label>
                    <input type="text"
                           name="nama"
                           value="{{ $pendaftar->nama }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Alamat</label>
                    <textarea name="alamat"
                              class="form-control"
                              required>{{ $pendaftar->alamat }}</textarea>
                </div>

                <div class="mb-3">
                    <label>No Telepon</label>
                    <input type="text"
                           name="no_telp"
                           value="{{ $pendaftar->no_telp }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Status</label>
                    <select name="status" class="form-control">
                        <option {{ $pendaftar->status=='Pending'?'selected':'' }}>Pending</option>
                        <option {{ $pendaftar->status=='Diterima'?'selected':'' }}>Diterima</option>
                        <option {{ $pendaftar->status=='Ditolak'?'selected':'' }}>Ditolak</option>
                    </select>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('pendaftar.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection