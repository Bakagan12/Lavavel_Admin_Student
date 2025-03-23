<?php namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminMiddleware {
    public function handle(Request $request, Closure $next): Response {
        // dd('Admin middleware triggered');
        if (auth()->check() && auth()->user()->role_id === 1) {
            return $next($request);
        }
        return redirect('/login')->with('error', 'You do not have access to this page.');
    }
}
