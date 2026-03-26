<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Murid;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class MuridController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $murids = Murid::with('user')->orderBy('id', 'desc')->get();
        return view('admin.murid.index', compact('murids'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.murid.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // Validasi
        $request->validate([
            'id_murid' => 'required',
            'nis' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'alamat' => 'required',
            'tgl_lahir' => 'required|date',
            'no_telp' => 'required',
            'sabuk' => 'required',
            'foto' => 'required|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // 1️⃣ Buat user login murid
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'murid'
        ]);

        // 2️⃣ Upload foto
        $fotoPath = $request->file('foto')->store('murid', 'public');

        // 3️⃣ Simpan data murid
        Murid::create([
            'id_murid' => $request->id_murid,
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'tgl_lahir' => $request->tgl_lahir,
            'no_telp' => $request->no_telp,
            'sabuk' => $request->sabuk,
            'foto' => $fotoPath,
            'user_id' => $user->id
        ]);

        return redirect()->route('murid.index')
            ->with('success', 'Data murid berhasil ditambahkan');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $murid = Murid::with('user')->findOrFail($id);
        return view('murid.edit', compact('murid'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $murid = Murid::with('user')->findOrFail($id);

        $request->validate([
            'nis' => 'required',
            'name' => 'required',
            'email' => 'required|email|unique:users,email,' . $murid->user_id,
            'alamat' => 'required',
            'no_telp' => 'required',
            'sabuk' => 'required',
            'foto' => 'nullable|image|mimes:jpg,jpeg,png|max:2048'
        ]);

        // Update user
        $murid->user->update([
            'name' => $request->name,
            'email' => $request->email,
        ]);

        // Jika upload foto baru
        if ($request->hasFile('foto')) {

            // Hapus foto lama
            if ($murid->foto && Storage::disk('public')->exists($murid->foto)) {
                Storage::disk('public')->delete($murid->foto);
            }

            $fotoPath = $request->file('foto')->store('murid', 'public');
            $murid->foto = $fotoPath;
        }

        $murid->update([
            'nis' => $request->nis,
            'alamat' => $request->alamat,
            'no_telp' => $request->no_telp,
            'sabuk' => $request->sabuk,
        ]);

        return redirect()->route('murid.index')
            ->with('success', 'Data murid berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
  public function destroy($id)
{
    $murid = Murid::findOrFail($id);

    // Hapus foto
    if ($murid->foto && Storage::disk('public')->exists($murid->foto)) {
        Storage::disk('public')->delete($murid->foto);
    }

    // Hapus user kalau ada
    if ($murid->user) {
        $murid->user->delete();
    }

    // Hapus murid
    $murid->delete();

    return redirect()->route('murid.index')
        ->with('success', 'Data murid berhasil dihapus');
}
}