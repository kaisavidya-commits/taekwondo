@extends('layout.app')

@section('title','Data Murid')

@section('content')

<div class="container-fluid">

    <!-- Header -->
    <div class="d-flex justify-content-between align-items-center mb-4">
        <div>
            <h3 class="fw-bold mb-1">Manajemen Murid</h3>
            <small class="text-muted">Kelola data murid Taekwondo</small>
        </div>

       
    </div>

    @if(session('success'))
        <div class="alert alert-success shadow-sm">
            {{ session('success') }}
        </div>
    @endif

    <div class="card border-0 shadow-sm rounded-4">
        <div class="card-body p-4">

            <!-- Search -->
            <div class="mb-4">
                <div class="search-bar-wrapper">
                    <input type="text"
                           id="searchInput"
                           class="search-bar-input"
                           placeholder="Cari nama atau NIS...">

                    <button class="search-bar-button">
                        Cari
                    </button>
                </div>
            </div>

            <div class="table-responsive">
                <table class="table align-middle" id="muridTable">
                    <thead class="table-light">
                        <tr>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Nama</th>
                            <th>Sabuk</th>
                            <th>No Telp</th>
                            <th width="150">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($murids as $murid)
                        <tr>
                            <td>{{ $loop->iteration }}</td>

                           

                            <td>
    @if($murid->pendaftar?->foto)
        <img src="{{ asset('storage/'.$murid->pendaftar->foto) }}"
             width="50" height="50"
             style="object-fit:cover;border-radius:8px;">
    @else
        <div style="width:50px;height:50px;border-radius:8px;
                    background:#eee;display:flex;align-items:center;
                    justify-content:center;color:#999;font-size:11px;">
            No foto
        </div>
    @endif
</td>

<td class="fw-semibold">
    {{ $murid->pendaftar?->nama ?? $murid->user->name }}
</td>
                            
                            <td>{{ $murid->sabuk }}</td>
                            <td>{{ $murid->no_telp }}</td>

                            <td class="d-flex gap-2">
                                <a href="{{ route('murid.edit',$murid->id) }}"
                                   class="btn btn-sm btn-warning">
                                   Edit
                                </a>

                                <form action="{{ route('murid.destroy',$murid->id) }}"
                                      method="POST"
                                      onsubmit="return confirm('Yakin hapus murid ini?')">
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
                            <td colspan="7" class="text-center text-muted">
                                Tidak ada data murid
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
    let rows = document.querySelectorAll("#muridTable tbody tr");

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