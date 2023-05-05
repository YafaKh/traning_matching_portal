<?php

namespace App\Http\Controllersrs\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;

class UniversityStudentsController extends Controller
{
        //filtering

     /**
     * list all university students with some info
     */
    public function index()
    {
        //select from student id, student_id, name, specialization, Gpa load , avalibility, regestrtion_state, progress, visit_form, evaluation, company_evaluation, assessment
       /* $studentsData= 
        Student::select(['id','student_num','student_name_id','specialization','company_id',''])
        ->get();*/
        return view('company_employee.hr.trainees..university_students');//,['students'=>$studentsData]);
    }

    public function add()
    {
        
    }
}
