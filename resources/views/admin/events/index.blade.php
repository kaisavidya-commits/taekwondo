@extends('layout.app')

@section('title','Data Event')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Manajemen Event</h3>
        <small class="text-muted">Kelola agenda kegiatan</small>
    </div>

    <div>
        <a href="{{ route('events.create') }}"
           class="btn btn-primary px-4">
            + Tambah Event
        </a>
    </div>
</div>
    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <div class="card shadow-sm border-0 rounded-4">
        <div class="card-body">

            <table class="table align-middle">
                <thead class="table-light">
                    <tr>
                        <th>#</th>
                        <th>Judul</th>
                        <th>Tanggal</th>
                        <th>Lokasi</th>
                        <th width="150">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($events as $event)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $event->judul }}</td>
                        <td>{{ $event->tanggal }}</td>
                        <td>{{ $event->lokasi }}</td>
                        <td class="d-flex gap-2">
                            <a href="{{ route('events.edit',$event->id) }}"
                               class="btn btn-sm btn-warning">
                               Edit
                            </a>

                            <form action="{{ route('events.destroy',$event->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada data event
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>

        </div>
    </div>

</div>

@endsection