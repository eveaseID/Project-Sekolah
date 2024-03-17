<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PemilikMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {

        if (Auth::user()->level == 'pemilik' || Auth::user()->level == 'admin' || Auth::user()->level == 'pelanggan' || Auth::user()->level == 'operator') {
            return $next($request);
        } else {
            return redirect(route('forb'));
        }
        return $next($request);
    }
}
