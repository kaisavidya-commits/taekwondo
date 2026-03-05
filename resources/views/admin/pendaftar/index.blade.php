@extends('layout.app')

@section('title','Data Pendaftar')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manajemen Pendaftar</h3>
            <small class="text-muted">Kelola data calon murid</small>
        </div>

        <a href="{{ route('pendaftar.create') }}" class="btn btn-primary shadow-sm">
            + Tambah Pendaftar
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Sekolah</th>
                            <th>No Telp</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftars as $pendaftar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $pendaftar->nama }}</td>
                            <td>{{ $pendaftar->sekolah }}</td>
                            <td>{{ $pendaftar->no_telp }}</td>
                            <td>
                                <span class="badge bg-{{ $pendaftar->status == 'Pending' ? 'warning' : 'success' }}">
                                    {{ $pendaftar->status }}
                                </span>
                            </td>
                            <td class="d-flex gap-2">
                                <a href="{{ route('pendaftar.edit',$pendaftar->id) }}"
                                   class="btn btn-sm btn-warning">
                                   Edit
                                </a>

                                <form action="{{ route('pendaftar.destroy',$pendaftar->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus data ini?')">
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
                            <td colspan="6" class="text-center text-muted">
                                Tidak ada data pendaftar
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

@endsection