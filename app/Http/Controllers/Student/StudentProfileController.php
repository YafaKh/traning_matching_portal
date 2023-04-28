<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class StudentProfileController extends Controller
{
    //
    public function show(){
        return view('student.profile');
    }
   
}
