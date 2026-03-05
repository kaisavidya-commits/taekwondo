@extends('layout.app')

@section('title','Manajemen Pembina')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-4">
    <div>
        <h3 class="fw-bold mb-1">Manajemen Pembina</h3>
        <small class="text-muted">Kelola data pembina Taekwondo</small>
    </div>

    <a href="{{ route('pembina.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Tambah Pembina
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
                <thead>
                    <tr>
                        <th>#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th>No Telp</th>
                        <th width="120">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($pembinas as $pembina)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $pembina->user->name ?? '-' }}</td>
                        <td>{{ $pembina->user->email ?? '-' }}</td>
                        <td>{{ $pembina->no_telpembina }}</td>
                        <td>
                            <form action="{{ route('pembina.destroy',$pembina->id_pembina) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus pembina?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center text-muted">
                            Tidak ada data pembina
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

@endsection