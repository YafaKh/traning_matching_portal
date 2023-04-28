<?php

namespace App\Http\Controllersrs\Supervisor;

use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //filtering

     /**
     * list his students with some info
     */
    public function index()
    {
        //select from student id, student_id, name, specialization, company, branch, training, progress, visit_form, evaluation, company_evaluation, assessment
       /* $studentsData= 
        Student::select(['id','student_num','student_name_id','specialization','company_id',''])
        ->get();*/
        return view('university_employee.coordinator.students.list');//,['students'=>$studentsData]);
    }
}
