@extends('layout.app')

@section('title','Data Pendaftar')

@section('content')

<div class="container-fluid">

    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manajemen Pendaftar</h3>
            <small class="text-muted">Kelola data calon murid</small>
        </div>

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
                            <th>ID</th>
                            <th>Nama</th>
                            <th>Alamat</th>
                            <th>No Telp</th>
                            <th>Tgl Lahir</th>
                            <th>Sekolah</th>
                            <th>Foto</th>
                            <th>Akte</th>
                            <th>KK</th>
                            <th>Status</th>
                            <th width="180">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($pendaftars as $pendaftar)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $pendaftar->id_pendaftar }}</td>
                            <td class="fw-semibold">{{ $pendaftar->nama }}</td>
                            <td>{{ $pendaftar->alamat }}</td>
                            <td>{{ $pendaftar->no_telp }}</td>
                            <td>{{ $pendaftar->tgl_lahir }}</td>
                            <td>{{ $pendaftar->sekolah }}</td>

                            <td>
                                @if($pendaftar->foto)
                                    <a href="{{ asset('storage/'.$pendaftar->foto) }}" target="_blank">
                                        Lihat
                                    </a>
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                @if($pendaftar->akte)
                                    <a href="{{ asset('storage/'.$pendaftar->akte) }}" target="_blank">
                                        Lihat
                                    </a>
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                @if($pendaftar->kk)
                                    <a href="{{ asset('storage/'.$pendaftar->kk) }}" target="_blank">
                                        Lihat
                                    </a>
                                @else
                                    -
                                @endif
                            </td>

                            <td>
                                <span class="badge bg-{{ $pendaftar->status == 'Pending' ? 'warning' : 'success' }}">
                                    {{ $pendaftar->status }}
                                </span>
                            </td>

                            <td class="d-flex gap-2">
                                <a href="{{ route('admin.pendaftar.edit', $pendaftar) }}"
                                   class="btn btn-sm btn-warning">
                                   Edit
                                </a>

                                <form action="{{ route('admin.pendaftar.destroy', $pendaftar) }}"
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
                            <td colspan="11" class="text-center text-muted">
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