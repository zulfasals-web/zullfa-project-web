<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class AdminMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        // Contoh pengecekan: pastikan user login dan memiliki status/role admin
        // Sesuaikan dengan kolom status/role di database anda (misal: user->role == 'admin' atau is_admin == 1)
        if (auth()->check() && (auth()->user()->role === 'admin' || auth()->user()->is_admin == 1)) {
            return $next($request);
        }

        // Jika admin cuba buka halaman pembeli, halang dan arahkan ke dashboard admin
        if (auth()->check()) {
            return redirect()->route('admin.baking-list.index')->with('error', 'Akses khusus admin.');
        }

        return redirect()->route('login');
    }
}