<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class RoleMiddleware
{
    public function handle($request, Closure $next, $role)
    {
        $roles = explode('|', $role);

        if (Auth::check() && in_array(Auth::user()->role->name, $roles)) {
            return $next($request);
        }

        return redirect()->route('admin.dashboard')->with('error', 'You are not authorized to access this page.');
    }
}
