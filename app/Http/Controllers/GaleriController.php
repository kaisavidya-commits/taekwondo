<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class GaleriController extends Controller
{
    public function index()
    {
        $datag = []; // sementara kosong
        return view('admin.galeri.index', compact('datag'));
    }
}
