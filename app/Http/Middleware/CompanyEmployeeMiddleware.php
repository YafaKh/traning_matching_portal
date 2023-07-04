<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CompanyEmployeeMiddleware
{
    public function handle(Request $request, Closure $next)
    {
        $userId = $request->route('user_id');

        if (Auth::guard('company_employee')->check() 
        && Auth::guard('company_employee')->id() == $userId) 
        {
            return $next($request);
        } 
        abort(403, 'Unauthorized');
    }
}
