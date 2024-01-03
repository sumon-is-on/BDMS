<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class checkAdmin
{
    public function handle(Request $request, Closure $next): Response{
        if (auth()->user()) {
            if (auth()->user()->role_id == 1) {
                return $next($request);
            } else {
                notify()->warning('Only Admin has the permission to admin panel.');
                return redirect()->route('user.login');
            }
        } else {
            notify()->warning('Only Admin has the permission to admin panel.');
            return redirect()->route('user.login');
        }
    }
}
