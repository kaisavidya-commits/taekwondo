<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        $datag = []; // sementara kosong
        return view('events.index', compact('datag'));
    }
}
