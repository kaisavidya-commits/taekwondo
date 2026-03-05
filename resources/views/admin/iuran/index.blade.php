@extends('layout.app')

@section('title','Manajemen Iuran')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manajemen Iuran</h3>
            <small class="text-muted">Kelola data iuran Taekwondo</small>
        </div>

        @if(in_array($role, ['super_admin','admin']))
        <a href="{{ route('admin.iuran.create') }}" class="btn btn-primary btn-sm">
            + Tambah Iuran
        </a>
        @endif
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="mb-4">
                <div class="search-bar-wrapper">
                    <input type="text"
                        id="searchInput"
                        class="search-bar-input"
                        placeholder="Cari nama atau email...">

                    <button class="search-bar-button">
                        Cari
                    </button>
                </div>
            </div>

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">
            <div class="table-responsive">
                <table class="table align-middle">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Murid</th>
                            <th>Unit</th>
                            <th>Harga</th>
                            <th>Keterangan</th>
                            <th>Status</th>
                            <th>Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($iurans as $iuran)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $iuran->murid->user->name ?? '-' }}</td>
                            {{ $iuran->murid?->user?->name ?? '-' }}                         
                            <td>{{ $iuran->unit }}</td>
                            <td>{{ $iuran->harga ?? '-' }}</td>
                            <td>{{ $iuran->keterangan ?? '-' }}</td>
                            <td>{{ $iuran->status ?? 'Belum Bayar' }}</td>
                            <td>
                                @if(in_array($role, ['super_admin','admin']))
                                    <form action="{{ route('admin.iuran.confirm', $iuran->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Konfirmasi</button>
                                    </form>
                                @elseif($role === 'murid' && $iuran->murid->id === auth()->id())
                                    <form action="{{ route('murid.iuran.bayar', $iuran->id) }}" method="POST" class="d-inline">
                                        @csrf
                                        <button type="submit" class="btn btn-warning btn-sm">Bayar</button>
                                    </form>
                                @elseif($role === 'pembina')
                                    <span class="badge bg-info">Lihat</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted">
                                Tidak ada data iuran
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#adminTable tbody tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value)
            ? ""
            : "none";
    });
});
</script>

<style>
/* =============================== */
/* SEARCH STYLE */
/* =============================== */

.search-bar-wrapper {
    display: flex;
    width: 100%;
    background: #eeeeee;
    border-radius: 14px;
    overflow: hidden;
}

.search-bar-input {
    flex: 1;
    border: none;
    padding: 14px 18px;
    font-size: 15px;
    background: transparent;
    outline: none;
}

.search-bar-input::placeholder {
    color: #6b7280;
}

.search-bar-button {
    background: #8b1e1e;
    color: white;
    border: none;
    padding: 0 28px;
    font-weight: 500;
    transition: 0.3s;
}

.search-bar-button:hover {
    background: #6f1616;
}
</style>

@endsection