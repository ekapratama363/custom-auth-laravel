<?php

namespace App\Http\Middleware;

use Closure;

class UserMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $session = $request->session()->all(); //ambil data session

        // jika role = user
        if(@$session['role'] == 1) return $next($request); //@untuk menyembunykan data jika session kosong

        return redirect('/login');
    }
}
