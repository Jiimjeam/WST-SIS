<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Is_Admin
{
    public function handle(Request $request, Closure $next) 
    {
        if (Auth::check() && Auth::user()->admin) {
            return $next($request);
        }
        abort(403, 'Unauthorized action.');
    }
  
}
