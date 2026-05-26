@extends('layout.app')

@section('title','Dashboard Admin')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manajemen Admin</h3>
            <small class="text-muted">Kelola akun admin sistem Taekwondo</small>
        </div>
        <a href="{{ route('admin.create') }}" class="btn btn-primary btn-sm">Tambah Akun</a>
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">{{ session('success') }}</div>
    @endif

    @if(session('error'))
        <div class="alert alert-danger shadow-sm">{{ session('error') }}</div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <div class="mb-4">
                <div class="search-bar-wrapper">
                    <input type="text" id="searchInput" class="search-bar-input" placeholder="Cari nama, email, atau role...">
                    <button class="search-bar-button">Cari</button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle" id="adminTable">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th>Email</th>
                            <th>Role</th>
                            <th>Dibuat</th>
                            <th width="120">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($admins as $admin)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td class="fw-semibold">{{ $admin->name }}</td>
                            <td>{{ $admin->email }}</td>
                            <td>
                                @if($admin->role === 'super_admin')
                                    <span class="badge bg-danger">Super Admin</span>
                                @elseif($admin->role === 'admin')
                                    <span class="badge bg-primary">Admin</span>
                                @elseif($admin->role === 'pembina')
                                    <span class="badge bg-success">Pembina</span>
                                @elseif($admin->role === 'murid' || $admin->role === 'siswa')
                                    <span class="badge bg-secondary">Siswa</span>
                                @else
                                    <span class="badge bg-light text-dark">{{ $admin->role }}</span>
                                @endif
                            </td>
                            <td>{{ $admin->created_at ? $admin->created_at->format('d M Y') : '-' }}</td>
                            <td>
                                @if(in_array($admin->role, ['super_admin', 'admin']) && auth()->id() !== $admin->id)
                                    <form action="{{ route('admin.destroy', $admin->id) }}"
                                          method="POST"
                                          onsubmit="return confirm('Yakin hapus admin {{ $admin->name }}?')">
                                        @csrf
                                        @method('DELETE')
                                        <button class="btn btn-sm btn-outline-danger rounded-pill">Hapus</button>
                                    </form>
                                @else
                                    <span class="text-muted small">—</span>
                                @endif
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="6" class="text-center text-muted">Tidak ada data</td>
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
    document.querySelectorAll("#adminTable tbody tr").forEach(row => {
        row.style.display = row.innerText.toLowerCase().includes(value) ? "" : "none";
    });
});
</script>

<style>
.search-bar-wrapper { display: flex; width: 100%; background: #eeeeee; border-radius: 14px; overflow: hidden; }
.search-bar-input { flex: 1; border: none; padding: 14px 18px; font-size: 15px; background: transparent; outline: none; }
.search-bar-input::placeholder { color: #6b7280; }
.search-bar-button { background: #8b1e1e; color: white; border: none; padding: 0 28px; font-weight: 500; transition: 0.3s; }
.search-bar-button:hover { background: #6f1616; }
</style>

@endsection