<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class MuridController extends Controller
{
       public function index()
{
    $datag = []; // sementara kosong
    return view('admin.murid.index', compact('datag'));
}
}
