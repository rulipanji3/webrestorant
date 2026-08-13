<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class AdminAuth
{
    public function handle(Request $request, Closure $next)
    {
        if (! $request->session()->get('admin_authenticated', false)) {
            return redirect()->route('admin.login.show');
        }

        return $next($request);
    }
}
