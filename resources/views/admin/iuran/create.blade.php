@extends('layout.app')

@section('title','Tambah Iuran')

@section('content')

<div class="container">
    <h3 class="mb-3">Tambah Iuran Baru</h3>

    <form action="{{ route('admin.iuran.store') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label for="id_murid" class="form-label">Murid</label>
            <select name="id_murid" id="id_murid" class="form-control" required>
                @foreach($murids as $murid)
                    <option value="{{ $murid->id }}">{{ $murid->user->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="unit" class="form-label">Unit</label>
            <select name="unit" id="unit" class="form-control" required>
                @foreach($units as $unit)
                    <option value="{{ $unit }}">{{ $unit }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
        <a href="{{ route('admin.iuran.index') }}" class="btn btn-secondary">Kembali</a>
    </form>
</div>

@endsection