@extends('layout.app')

@section('title','Edit Event')

@section('content')

<div class="container-fluid">

    <h3 class="fw-bold mb-4">Edit Event</h3>

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <form action="{{ route('events.update',$event->id) }}" method="POST">
                @csrf
                @method('PUT')

                <div class="mb-3">
                    <label>Judul</label>
                    <input type="text"
                           name="judul"
                           value="{{ $event->judul }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Deskripsi</label>
                    <textarea name="deskripsi"
                              class="form-control"
                              required>{{ $event->deskripsi }}</textarea>
                </div>

                <div class="mb-3">
                    <label>Tanggal</label>
                    <input type="date"
                           name="tanggal"
                           value="{{ $event->tanggal }}"
                           class="form-control"
                           required>
                </div>

                <div class="mb-3">
                    <label>Lokasi</label>
                    <input type="text"
                           name="lokasi"
                           value="{{ $event->lokasi }}"
                           class="form-control"
                           required>
                </div>

                <button class="btn btn-primary">Update</button>
                <a href="{{ route('events.index') }}" class="btn btn-secondary">Kembali</a>

            </form>

        </div>
    </div>

</div>

@endsection