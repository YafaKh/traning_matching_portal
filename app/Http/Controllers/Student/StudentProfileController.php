<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentProfileController extends Controller
{
   
    public function show($user_id){
          $user =Student::find($user_id);
          $student= $user;
            
          return view('student.profile',compact('user', 'student'));  
    }
}
