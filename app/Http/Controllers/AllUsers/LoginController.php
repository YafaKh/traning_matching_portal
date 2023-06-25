<?php

namespace App\Http\Controllers\AllUsers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function authenticate(Request $request, $user_type): RedirectResponse
    {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
            'active' => [1]
        ]);
    
        if (Auth::guard($user_type)->attempt($credentials)) {
            $request->session()->regenerate();
    
            return redirect()->route('home');
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }    
}
