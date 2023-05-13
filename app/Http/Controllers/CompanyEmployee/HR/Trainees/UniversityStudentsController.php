<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;

class UniversityStudentsController extends Controller
{
        //filtering

     /**
     * list all university students with some info
     */
    public function index()
    {
        //remove approved ones
        $students = Student::select(
        'first_name_en', 'last_name_en', 'gpa', 'load','availability_date')
        ->get();
        return view('company_employee.hr.trainees.university_students',['students'=>$students]);
    }

    public function add()
    {
        
    }
}
