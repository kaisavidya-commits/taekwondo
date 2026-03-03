<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
{
    $datag = []; // sementara kosong
    return view('admin.index', compact('datag'));
}
}
