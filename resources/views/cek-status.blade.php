<form method="POST" action="{{ route('cek.hasil') }}">
    @csrf
    <input type="email" name="email" placeholder="Masukkan email pendaftaran" class="form-control" required>
    <button type="submit" class="btn btn-primary mt-2">Cek Status</button>
</form>

@isset($pendaftar)
    <div class="mt-4 alert 
        {{ $pendaftar->status == 'Diterima' ? 'alert-success' : 
           ($pendaftar->status == 'Ditolak' ? 'alert-danger' : 'alert-warning') }}">
        <strong>{{ $pendaftar->nama }}</strong> — 
        Status: <strong>{{ $pendaftar->status }}</strong>

        @if($pendaftar->status == 'Diterima')
            <p class="mt-2">Selamat! Silakan cek email kamu untuk kredensial login.</p>
        @elseif($pendaftar->status == 'Ditolak')
            <p class="mt-2">Maaf, pendaftaran kamu belum bisa kami terima saat ini.</p>
        @else
            <p class="mt-2">Pendaftaran kamu sedang kami proses. Mohon tunggu ya!</p>
        @endif
    </div>
@endisset