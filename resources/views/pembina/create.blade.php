@extends('layout.app')

@section('title','Tambah Pembina')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Tambah Pembina</h3>
        <small class="text-muted">Tambahkan pembina baru ke sistem</small>
    </div>

    <a href="{{ route('pembina.index') }}" class="btn btn-outline-secondary rounded-pill">
        <i class="bi bi-arrow-left me-1"></i> Kembali
    </a>
</div>

@if ($errors->any())
    <div class="alert alert-danger shadow-sm">
        <ul class="mb-0">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <form action="{{ route('pembina.store') }}" method="POST">
            @csrf

            <!-- Pilih User -->
            <div class="mb-3">
                <label class="form-label fw-semibold">Pilih User</label>
                <select name="id" class="form-select custom-input" required>
                    <option value="">-- Pilih User Pembina --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">
                            {{ $user->name }} ({{ $user->email }})
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- No Telp -->
            <div class="mb-4">
                <label class="form-label fw-semibold">Nomor Telepon</label>
                <input type="text"
                       name="no_telpembina"
                       class="form-control custom-input"
                       placeholder="Contoh: 08123456789"
                       value="{{ old('no_telpembina') }}"
                       required>
            </div>

            <div class="text-end">
                <button type="submit" class="btn btn-primary px-4">
                    <i class="bi bi-save me-1"></i> Simpan
                </button>
            </div>

        </form>

    </div>
</div>

@endsection