<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Auth;
use App\Models\Tugas;

class TugasMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    // Akses ke menu maba
    public function handle(Request $request, Closure $next)
    {
        if (session('role') == 'tugas' || session('table') == 'admin') {
            // return redirect()->route('login')->with('error', 'Login First!');
            return $next($request);
        } else {
            return redirect()->route('admin.login')->with('error', 'Login as an admin/tugas first');
        }
    }
}
