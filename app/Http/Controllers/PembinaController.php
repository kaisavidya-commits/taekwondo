<?php

namespace App\Http\Controllers;

use App\Models\Pembina;
use App\Models\User;
use Illuminate\Http\Request;

class PembinaController extends Controller
{
    public function index()
    {
        $pembinas = Pembina::with('user')->get();
        return view('pembina.index', compact('pembinas'));
    }

    public function create()
    {
        $users = User::where('role','pembina')->get();
        return view('pembina.create', compact('users'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'no_telpembina' => 'required',
            'id' => 'required'
        ]);

        Pembina::create($request->all());

        return redirect()->route('pembina.index')
            ->with('success','Pembina berhasil ditambahkan');
    }

    public function destroy($id)
    {
        Pembina::findOrFail($id)->delete();

        return back()->with('success','Pembina berhasil dihapus');
    }
}