<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class PembinaController extends Controller
{
    public function index()
    {
        $pembinas = Pembina::with('user')->get();
        return view('admin.pembina.index', compact('pembinas'));
    }

    public function create()
    {
        $users = User::where('role','pembina')->get();
        return view('admin.pembina.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:6',
            'no_telpembina' => 'required|max:13'
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'pembina'
        ]);

        Pembina::create([
            'id' => $user->id,
            'no_telpembina' => $request->no_telpembina
        ]);

        return redirect()->route('admin.pembina.index')
                        ->with('success','Pembina berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Pembina::findOrFail($id)->delete();

        return back()->with('success','Pembina berhasil dihapus');
    }
}