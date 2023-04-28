<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentProfileController extends Controller
{
   
    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //view student profile
        $studentsData= Student::all();
        return view('all_users.profile',['students'=>$studentsData]);
    }

}
