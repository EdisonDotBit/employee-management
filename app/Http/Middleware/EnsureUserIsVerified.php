<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;

class EnsureUserIsVerified
{
    public function handle(Request $request, Closure $next)
    {
        if (auth()->check() && !auth()->user()->is_verified) {
            auth()->logout();
            return redirect()->route('verify.pin')->with([
                'email' => $request->user()->email,
                'error' => 'Please verify your email before accessing this page'
            ]);
        }

        return $next($request);
    }
}
