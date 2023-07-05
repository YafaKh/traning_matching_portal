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
            
            // Get the logged-in employee
            $user = Auth::guard($user_type)->user();
            // Redirect the user to his main page according to his type
            if($user_type=='company_employee'){
                if($user->company_employee_role_id==1 || $user->company_employee_role_id==3)
                    return redirect()->route('hr_list_trainees', ['user_id' => $user->id]);
               else 
                    return redirect()->route('trainer_list_traniees', ['user_id' => $user->id]);
            }
            else if($user_type=='university_employee'){
                if($user->university_employee_role_id==1 || $user->university_employee_role_id==3)
                    return redirect()->route('coordinator_list_students', ['user_id' => $user->id]);
                else
                    return redirect()->route('supervisor_list_students', ['user_id' => $user->id]);
            }
            else if($user_type=='student'){
                return redirect()->route('student_profile', ['user_id' => $user->id]);
            }
            else if($user_type=='admin'){
                return redirect()->route('admin_companies', ['user_id' => $user->id]);
            }
        }
    
        return back()->withErrors([
            'email' => 'The provided credentials do not match our records.',
        ])->onlyInput('email');
    }     
}
