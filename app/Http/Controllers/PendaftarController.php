<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PendaftarController extends Controller
{
       public function index()
{
    $datag = []; // sementara kosong
    return view('admin.pendaftar.index', compact('datag'));
}
}
