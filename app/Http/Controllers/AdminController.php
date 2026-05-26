<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
 
    public function create()
    {
        return view('admin.admin.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6'
        ]);

        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role'     => 'admin',
        ]);

        return redirect()->route('admin.index')
            ->with('success','Admin berhasil ditambahkan');
    }

   public function index()
{
    // Pilih opsi A atau B sesuai kebutuhan

    // Opsi A: tampilkan SEMUA user (dengan kolom role di tabel)
    $admins = User::orderBy('created_at', 'desc')->get();

    // Opsi B: tampilkan hanya super_admin dan admin saja
    // $admins = User::whereIn('role', ['super_admin', 'admin'])->orderBy('created_at', 'desc')->get();

    return view('admin.admin.index', compact('admins'));
}

public function destroy($id)
{
    $admin = User::findOrFail($id);

    // Tidak boleh hapus diri sendiri
    if (auth()->id() === $admin->id) {
        return back()->with('error', 'Tidak bisa menghapus akun sendiri.');
    }

    // Tidak boleh hapus role selain super_admin dan admin
    if (!in_array($admin->role, ['super_admin', 'admin'])) {
        return back()->with('error', 'Tidak bisa menghapus akun ' . $admin->role . '. Hanya akun admin yang bisa dihapus di sini.');
    }

    // Pastikan minimal 1 super_admin tersisa
    $totalSuperAdmin = User::where('role', 'super_admin')->count();
    if ($admin->role === 'super_admin' && $totalSuperAdmin <= 1) {
        return back()->with('error', 'Tidak bisa menghapus super admin terakhir.');
    }

    $admin->delete();

    return back()->with('success', 'Admin ' . $admin->name . ' berhasil dihapus.');
}
}