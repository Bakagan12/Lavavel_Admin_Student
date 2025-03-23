<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class Admin
{
    public function handle(Request $request, Closure $next)
    {
        // Ensure the user is authenticated and has role_id = 1 (admin)
        if (auth()->check() && auth()->user()->role_id === 1) {
            return $next($request); // Allow the request to proceed if the user is an admin
        }

        // Redirect the user if they don't have the required role
        return redirect()->route('login')->with('error', 'You do not have access to this page.');
    }
}
