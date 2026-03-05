@extends('layout.app')

@section('title','Dashboard Pembina')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manajemen Pembina</h3>
            <small class="text-muted">Kelola akun pembina sistem Taekwondo</small>
        </div>

        <a href="{{ route('pembina.create') }}" class="btn btn-primary shadow-sm">
            + Tambah Pembina
        </a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <!-- Card -->
    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <!-- Search -->
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

            <div class="table-responsive">
                <table class="table align-middle" id="pembinaTable">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>ID Pembina</th>
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
                            <td>{{ $pembina->id_pembina }}</td>
                            <td class="fw-semibold">
                                {{ $pembina->user->name ?? '-' }}
                            </td>
                            <td>
                                {{ $pembina->user->email ?? '-' }}
                            </td>
                            <td>{{ $pembina->no_telpembina }}</td>
                            <td>
                                <form action="{{ route('pembina.destroy', $pembina->id_pembina) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus pembina ini?')">
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
                            <td colspan="6" class="text-center text-muted">
                                Tidak ada data pembina
                            </td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

        </div>
    </div>

</div>

<!-- Live Search Script -->
<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#pembinaTable tbody tr");

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