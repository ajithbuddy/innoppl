<?php

namespace App\Http\Middleware;

use Closure;

class PreventBackToLogin
{
    public function handle($request, Closure $next)
    {
        if (auth()->check()) {
            return redirect('/dashboard'); // Change '/dashboard' to your desired route
        }

        return $next($request);
    }
}