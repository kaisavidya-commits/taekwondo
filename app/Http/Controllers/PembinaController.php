<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PembinaController extends Controller
{
      public function index()
{
    $datag = []; // sementara kosong
    return view('pembina.index', compact('datag'));
}
}
