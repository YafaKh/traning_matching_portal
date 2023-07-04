<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class StudentMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userId = $request->route('user_id');

        if (Auth::guard('student')->check() 
        && Auth::guard('student')->id() == $userId) 
        {
            return $next($request);
        } 
        abort(403, 'Unauthorized');
    }
}
