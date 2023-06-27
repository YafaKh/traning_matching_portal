<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HrAuthenticationMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userId = $request->route('user_id');

        if (Auth::guard('company_employee')->check() && Auth::guard('company_employee')->id() == $userId) {
            return $next($request);
        } elseif (Auth::guard('university_employee')->check() && Auth::guard('university_employee')->id() == $userId) {
            return $next($request);
        }

        abort(403, 'Unauthorized');
    }
}
