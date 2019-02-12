<?php

namespace App\Http\Middleware;

use Closure;

class AdminMiddleware
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

        // jika role = admin
        if(@$session['role'] == 2) return $next($request); //@untuk menyembunykan data jika session kosong

        return abort(403);
    }
}
