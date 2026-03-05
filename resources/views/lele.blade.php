@extends('layout.app')

@section('title','Dashboard Admin')

@section('content')

<!-- ================= HEADER ================= -->
<div class="d-flex justify-content-between align-items-center mb-4 page-header">
    <div>
        <h3 class="fw-bold mb-1 text-dark">Manajemen Admin</h3>
        <small class="text-muted">Kelola akun admin sistem Taekwondo</small>
    </div>

    <a href="{{ route('admin.create') }}" class="btn btn-primary shadow-sm">
        <i class="bi bi-plus-circle me-1"></i> Tambah Admin
    </a>
</div>

<!-- ================= ALERT ================= -->
@if(session('success'))
    <div class="alert alert-success shadow-sm">
        <i class="bi bi-check-circle me-2"></i>
        {{ session('success') }}
    </div>
@endif

<!-- ================= CARD ================= -->
<div class="card border-0 shadow-sm rounded-4 admin-card">
    <div class="card-body p-4">

        <!-- Search -->
        <div class="mb-4">
            <div class="input-group search-box">
                <span class="input-group-text bg-white border-end-0">
                    <i class="bi bi-search text-muted"></i>
                </span>
                <input type="text"
                    id="searchInput"
                    class="form-control border-start-0"
                    placeholder="Cari nama atau email admin...">
            </div>
        </div>

        <!-- Table -->
        <div class="table-responsive">
            <table class="table align-middle admin-table" id="adminTable">
                <thead>
                    <tr>
                        <th width="50">#</th>
                        <th>Nama</th>
                        <th>Email</th>
                        <th width="150">Dibuat</th>
                        <th width="120" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse($admins as $admin)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td class="fw-semibold">{{ $admin->name }}</td>
                        <td>{{ $admin->email }}</td>
                        <td>
                            <span class="badge-date">
                                {{ $admin->created_at ? $admin->created_at->format('d M Y') : '-' }}
                            </span>
                        </td>
                        <td class="text-center">
                            <form action="{{ route('admin.destroy', $admin->id) }}"
                                  method="POST"
                                  onsubmit="return confirm('Yakin hapus admin ini?')">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-outline-danger rounded-pill px-3">
                                    Hapus
                                </button>
                            </form>
                        </td>
                    </tr>
                    @empty
                    <tr>
                        <td colspan="5" class="text-center empty-state">
                            <i class="bi bi-inbox fs-4 d-block mb-2"></i>
                            Tidak ada data admin
                        </td>
                    </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

    </div>
</div>

<!-- ================= LIVE SEARCH ================= -->
<script>
document.getElementById("searchInput").addEventListener("keyup", function() {
    let value = this.value.toLowerCase();
    let rows = document.querySelectorAll("#adminTable tbody tr");

    rows.forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value)
            ? "" : "none";
    });
});
</script>

@endsection