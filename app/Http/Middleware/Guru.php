<?php

namespace App\Http\Middleware;

use Auth;
use Closure;
use Illuminate\Http\Request;

class Guru
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
        if (!Auth::check()) {
            return redirect()->route('login');
        }
        if (Auth::user()->role == 'kurikulum') {
            return redirect()->route('kurikulum');
        }

        if (Auth::user()->role == 'kepsek') {
            return redirect()->route('kepsek');
        }

        if (Auth::user()->role == 'guru') {
            return $next($request);
        } else{
            return back();
        }
    }
}
