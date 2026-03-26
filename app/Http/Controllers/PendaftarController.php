<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use App\Models\Murid;
use App\Mail\PendaftaranDiterima;
use Illuminate\Support\Facades\Mail;


class pendaftarController extends Controller
{
    public function index()
    {
        $pendaftars = Pendaftar::all();
        return view('admin.pendaftar.index', compact('pendaftars'));
    }

    public function create()
    {
        return view('admin.pendaftar.create');
    }
    public function form()
    {
        return view('pendaftar.form');
    }
    public function edit($id)
{
    $pendaftar = \App\Models\Pendaftar::findOrFail($id);

    return view('admin.pendaftar.edit', compact('pendaftar'));
}

    public function store(Request $request)
{
    $request->validate([
        'nama' => 'required',
         'email' => 'required|email|unique:pendaftar,email',
        'alamat' => 'required',
        'no_telp' => 'required',
        'tgl_lahir' => 'required|date',
        'sekolah' => 'required',
        'foto' => 'required|image',
        'akte' => 'required|file',
        'kk' => 'required|file',
    ]);

    Pendaftar::create([
        'nama' => $request->nama,
         'email' => $request->email,
        'alamat' => $request->alamat,
        'no_telp' => $request->no_telp,
        'tgl_lahir' => $request->tgl_lahir,
        'sekolah' => $request->sekolah,
        'foto' => $request->file('foto')->store('foto','public'),
        'akte' => $request->file('akte')->store('akte','public'),
        'kk' => $request->file('kk')->store('kk','public'),
        'status' => 'Pending'
    ]);

   return redirect()->route('pendaftaran')
    ->with('success', "Pendaftaran atas nama {$request->nama} berhasil dikirim! Pantau status pendaftaran kamu melalui email {$request->email}.");
}

public function update(Request $request, $id)
{
    $pendaftar = Pendaftar::findOrFail($id);

    $pendaftar->update([
        'nama'    => $request->nama,
        'alamat'  => $request->alamat,
        'no_telp' => $request->no_telp,
        'status'  => $request->status,
    ]);

    if ($request->status === 'Diterima' && !User::where('email', $pendaftar->email)->exists()) {

        $password = Str::random(8);
        $user = User::create([
            'name'     => $pendaftar->nama,
            'email'    => $pendaftar->email,
            'password' => Hash::make($password),
            'role'     => 'murid',
        ]);

        try {
            Murid::create([
                'id'           => $user->id,
                'id_pendaftar' => $pendaftar->id_pendaftar,
                'nis'          => $this->generateNIS(),
                'nama'         => $pendaftar->nama,
                'alamat'       => $pendaftar->alamat,
                'tgl_lahir'    => $pendaftar->tgl_lahir,
                'no_telp'      => $pendaftar->no_telp,
                'foto'         => $pendaftar->foto,
                'sabuk'        => 'Putih',
            ]);

            Mail::to($pendaftar->email)->send(new PendaftaranDiterima($pendaftar, $password));

            return redirect()->route('pendaftar.index')
                ->with('success', "Diterima! Kredensial login sudah dikirim ke {$pendaftar->email}");

        } catch (\Exception $e) {
            return redirect()->route('pendaftar.index')
                ->with('error', 'Gagal: ' . $e->getMessage());
        }
    }

    return redirect()->route('pendaftar.index')
        ->with('success', 'Data pendaftar berhasil diupdate.');
}


private function generateNIS()
{
    $tahun = date('Y');
    $count = Murid::count() + 1;
    return $tahun . str_pad($count, 4, '0', STR_PAD_LEFT);
}
public $timestamps = false;
public function tolak($id)
{
    $pendaftar = Pendaftar::findOrFail($id);
    $pendaftar->update(['status' => 'Ditolak']);

    return redirect()->back()->with('success', 'Pendaftaran ditolak.');
}

public function cekStatus()
{
    return view('public.cek-status');
}

public function hasilStatus(Request $request)
{
    $pendaftar = Pendaftar::where('email', $request->email)->first();

    if (!$pendaftar) {
        return back()->with('error', 'Email tidak ditemukan.');
    }

    return view('public.cek-status', compact('pendaftar'));
}
public function destroy($id)
{
    // Temukan data pendaftar berdasarkan ID
    $pendaftar = \App\Models\Pendaftar::findOrFail($id);

    // Hapus data
    $pendaftar->delete();

    // Redirect kembali dengan pesan sukses
    return redirect()->route('pendaftar.index')->with('success', 'Data berhasil dihapus.');
}
}