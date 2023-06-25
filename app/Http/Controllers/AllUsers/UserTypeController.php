<?php

namespace App\Http\Controllers\AllUsers;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;

class UserTypeController extends Controller
{
    public function login($user_type)
    {
        return view('all_users.login', ['user_type' => $user_type]);
    }
}
