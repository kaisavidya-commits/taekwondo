<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pendaftar;

class PendaftarController extends Controller
{
       public function index()
{
    $pendaftars = Pendaftar::orderBy('id_pendaftar', 'desc')->get();
    return view('admin.pendaftar.index', compact('pendaftars'));
}
}
