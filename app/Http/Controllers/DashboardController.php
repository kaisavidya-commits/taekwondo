<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DashboardController extends Controller
{
//     public function index()
// {
//     $datag = []; // sementara kosong
//     return view('dashboard.index', compact('datag'));
// }
public function index()
{
    $role = auth()->user()->role;

    return view('dashboard.index', compact('role'));
}
}
