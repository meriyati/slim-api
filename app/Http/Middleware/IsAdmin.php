<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class IsAdmin
{
    public function handle(Request $request, Closure $next)
    {
        if (Auth::check() && Auth::user()->role === 'admin') {
            return $next($request); // Melanjutkan request jika role adalah 'admin'
        }

        return redirect('/home'); // Redirect ke halaman home jika bukan admin
    }
}

