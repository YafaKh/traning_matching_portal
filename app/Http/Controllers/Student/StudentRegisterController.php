<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class StudentRegisterController extends Controller
{
    public function create(){
        return view('student.register');
    }
    public function createNextPage(){
        return view('student.register2');

    }
    public function store(){
        // storing data into DB using ajax
        Student::create{
            
        }
    }
} 
