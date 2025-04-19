<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class CheckRole
{
    public function handle($request, Closure $next, $role)
    {
        if (! Auth::guard($role)->check() || Auth::guard($role)->user()->role !== $role) {
            abort(403);
        }
        return $next($request);
    }
}
