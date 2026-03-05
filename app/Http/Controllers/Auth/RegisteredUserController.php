<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;
use App\Models\Pendaftar;
use App\Models\Murid;



class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     */

    
    public function store(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'id_pendaftar' => ['required','numeric'],
            'email' => ['required','string','email','max:255','unique:users'],
            'password' => ['required','confirmed', \Illuminate\Validation\Rules\Password::defaults()],
        ]);
    
        // 🔎 CEK PENDAFTAR DITERIMA
        $pendaftar = Pendaftar::where('id_pendaftar', $request->id_pendaftar)
            ->where('status','Diterima')
            ->first();
    
        if(!$pendaftar){
            return back()->withErrors([
                'id_pendaftar' => 'ID tidak valid atau belum diterima'
            ]);
        }
    
        // 🔎 CEK SUDAH PUNYA AKUN
        $cekMurid = Murid::where('id_pendaftar',$request->id_pendaftar)->first();
        if($cekMurid){
            return back()->withErrors([
                'id_pendaftar' => 'Akun sudah dibuat'
            ]);
        }
    
        // 🔎 COCOKKAN NAMA
        if($pendaftar->nama !== $request->name){
            return back()->withErrors([
                'name' => 'Nama tidak sesuai dengan data pendaftaran'
            ]);
        }
    
        // ✅ BUAT USER
        $user = User::create([
            'name' => $pendaftar->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'siswa',
        ]);
    
        // ✅ INSERT KE TABEL MURID
        Murid::create([
            'nis' => rand(100000,999999),
            'alamat' => $pendaftar->alamat,
            'tgl_lahir' => $pendaftar->tgl_lahir,
            'no_telp' => $pendaftar->no_telp,
            'sabuk' => 'Putih',
            'foto' => $pendaftar->foto,
            'id_pendaftar' => $pendaftar->id_pendaftar,
            'id' => $user->id,
        ]);
    
        return redirect()->route('login')
            ->with('success','Akun berhasil dibuat, silakan login');
    }
}