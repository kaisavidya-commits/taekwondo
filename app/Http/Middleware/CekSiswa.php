<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Murid;

class CekSiswa
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role == 'siswa') {

            $murid = Murid::where('id', Auth::id())->first();

            if (!$murid) {
                Auth::logout();
                return redirect('/login')
                    ->with('error','Akun belum aktif');
            }
        }

        return $next($request);
    }
}