@extends('layout.app')

@section('title','Tambah Pembina')

@section('content')


<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">Tambah Pembina</h4>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('pembina.store') }}" method="POST">
            @csrf

            <div class="mb-3">
                <label class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="mb-3">
                <label class="form-label">No Telepon</label>
                <input type="text"
                       name="no_telpembina"
                       class="form-control"
                       maxlength="13"
                       required>
            </div>

            <button class="btn btn-primary rounded-pill">
                Simpan
            </button>

            <a href="{{ route('pembina.index') }}"
               class="btn btn-secondary rounded-pill">
               Kembali
            </a>


        </form>

    </div>
</div>

@endsection