<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    public function form()
    {
        return view('auth.signup_siswa');
    }

    public function store(Request $request)
    {
        // 1️⃣ VALIDASI INPUT
        $request->validate([
            'id_pendaftar' => 'required|numeric',
            'nama' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6|confirmed',
        ]);

        // 2️⃣ CEK PENDAFTAR ADA & DITERIMA
        $pendaftar = Pendaftar::where('id_pendaftar', $request->id_pendaftar)
            ->where('status', 'Diterima')
            ->first();

        if (!$pendaftar) {
            return back()->with('error', 'ID tidak valid atau belum diterima');
        }

        // 3️⃣ CEK SUDAH PUNYA AKUN ATAU BELUM
        $cekMurid = Murid::where('id_pendaftar', $request->id_pendaftar)->first();
        if ($cekMurid) {
            return back()->with('error', 'Akun sudah dibuat');
        }

        // 4️⃣ COCOKKAN NAMA
        if ($pendaftar->nama != $request->nama) {
            return back()->with('error', 'Nama tidak sesuai dengan data pendaftaran');
        }

        // 5️⃣ BUAT USER
        $user = User::create([
            'name' => $pendaftar->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa'
        ]);

        // 6️⃣ INSERT KE TABEL MURID
        Murid::create([
            'nis' => rand(100000,999999),
            'alamat' => $pendaftar->alamat,
            'tgl_lahir' => $pendaftar->tgl_lahir,
            'no_telp' => $pendaftar->no_telp,
            'sabuk' => 'Putih',
            'foto' => $pendaftar->foto,
            'id_pendaftar' => $pendaftar->id_pendaftar,
            'id' => $user->id
        ]);

        return redirect()->route('login')
            ->with('success','Akun berhasil dibuat, silakan login');
    }
}