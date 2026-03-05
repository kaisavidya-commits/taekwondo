<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;


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
        ->with('success','Pendaftaran berhasil dikirim!');
}

public function update(Request $request, Pendaftar $pendaftar)
{
    $request->validate([
        'nama' => 'required',
        'alamat' => 'required',
        'no_telp' => 'required',
        'status' => 'required',
    ]);

    $pendaftar->update($request->all());

    return redirect()->route('pendaftar.index')
        ->with('success','Data berhasil diupdate');
}
}