<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class IuranController extends Controller
{
       public function index()
{
    $datag = []; // sementara kosong
    return view('iuran.index', compact('datag'));
}
}
