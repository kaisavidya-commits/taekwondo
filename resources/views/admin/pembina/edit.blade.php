@extends('layout.app')

@section('title','Edit Pembina')

@section('content')

<div class="card border-0 shadow-sm rounded-4">
    <div class="card-body p-4">

        <h4 class="fw-bold mb-4">Edit Pembina</h4>

        <form action="{{ route('pembina.update',$pembina->id_pembina) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="mb-3">
                <label class="form-label">Pilih User</label>
                <select name="id" class="form-select">
                    @foreach($users as $user)
                        <option value="{{ $user->id }}"
                            {{ $pembina->id == $user->id ? 'selected' : '' }}>
                            {{ $user->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="mb-3">
                <label>No Telepon</label>
                <input type="text"
                       name="no_telpembina"
                       value="{{ $pembina->no_telpembina }}"
                       class="form-control">
            </div>

            <button class="btn btn-primary rounded-pill">Update</button>
            <a href="{{ route('pembina.index') }}"
               class="btn btn-secondary rounded-pill">Kembali</a>

        </form>

    </div>
</div>

@endsection