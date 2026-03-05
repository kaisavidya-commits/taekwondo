<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Form Pendaftaran</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CDN -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body style="background-color:#f8f9fa;">

<div class="container py-5">

    <div class="row justify-content-center">
        <div class="col-md-8">

            <div class="text-center mb-4">
                <h2 class="fw-bold">Form Pendaftaran</h2>
                <p class="text-muted">Input data calon murid</p>
            </div>

            <div class="card shadow-sm border-0 rounded-4">
                <div class="card-body p-4">

                    @if($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form action="{{ route('pendaftar.store') }}"
                          method="POST"
                          enctype="multipart/form-data">
                        @csrf

                        <div class="mb-3">
                            <label class="form-label">Nama</label>
                            <input type="text" name="nama" class="form-control"
                                   value="{{ old('nama') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Alamat</label>
                            <textarea name="alamat" class="form-control" required>{{ old('alamat') }}</textarea>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">No Telepon</label>
                            <input type="text" name="no_telp" class="form-control"
                                   value="{{ old('no_telp') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Tanggal Lahir</label>
                            <input type="date" name="tgl_lahir" class="form-control"
                                   value="{{ old('tgl_lahir') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Sekolah</label>
                            <input type="text" name="sekolah" class="form-control"
                                   value="{{ old('sekolah') }}" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Foto</label>
                            <input type="file" name="foto" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload Akte</label>
                            <input type="file" name="akte" class="form-control" required>
                        </div>

                        <div class="mb-3">
                            <label class="form-label">Upload KK</label>
                            <input type="file" name="kk" class="form-control" required>
                        </div>

              <div class="d-grid">
    <button class="btn btn-primary rounded-3" style="background-color: #8B2A2E;">
        Daftar Sekarang
    </button>
    
    <a href="{{ route('welcome') }}" class="btn rounded-3 mt-2" style="background-color: #B7B8C7; color: white; border: none;">
        Kembali
    </a>
    
</div>
{{-- Pesan Berhasil --}}
@if (session('success'))
    <div style="background:#d1fae5;color:#065f46;padding:10px;border-radius:6px;margin-bottom:10px;">
        {{ session('success') }}
    </div>
@endif

{{-- Pesan Gagal --}}
@if (session('error'))
    <div style="background:#fee2e2;color:#991b1b;padding:10px;border-radius:6px;margin-bottom:10px;">
        {{ session('error') }}
    </div>
@endif

{{-- Error Validasi --}}
@if ($errors->any())
    <div style="background:#fee2e2;color:#991b1b;padding:10px;border-radius:6px;margin-bottom:10px;">
        <ul style="margin-left:15px;">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

                    </form>

                </div>
            </div>

        </div>
    </div>

</div>

</body>
</html>