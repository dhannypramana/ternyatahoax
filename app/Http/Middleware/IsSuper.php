<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class IsSuper
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
        if (auth()->user()->is_super == 1) {
            return $next($request);
        }

        return redirect('/admin/dashboard')->with('admin', 'You need Super Admin Access');
    }
}