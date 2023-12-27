<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class Authenticate extends Middleware
{
    protected function redirectTo(Request $request): ?string{
        if (! $request->expectsJson()) {
            notify()->warning('Please login First');
            return route('admin.login');
        }
        if(Auth::user()->role_id == 1){
            return redirect()->route('backend.dashboard');
        }else{
            return redirect()->route('web.home');
        }
    }
}
