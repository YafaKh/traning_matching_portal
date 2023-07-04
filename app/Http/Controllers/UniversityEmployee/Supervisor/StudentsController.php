<?php

namespace App\Http\Controllers\UniversityEmployee\Supervisor;

use App\Models\UniversityEmployee;
use App\Models\Progress;
use App\Models\EvaluateCompany;
use App\Models\EvaluateStudent;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class StudentsController extends Controller
{
    //filtering

     /**
     * list his students with some info
     */
    public function index($user_id)
    {
        $supervisor=UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($user_id);//role_id = ??
        if ($supervisor==null) {
            return "supervisor not found ";
        }
        $allStudents=$supervisor->students()->paginate(10);

        return view('university_employee.supervisor.students',compact('supervisor','allStudents'));//,['students'=>$studentsData]);
    }
    public function showProgressPage($user_id,$student_id)
    {
        $supervisor=UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($user_id);//role_id = ??
        if ($supervisor==null) {
            return "supervisor not found ";
        }
        $allStudents=$supervisor->students()->paginate(10);
        $student = $allStudents->find($student_id);


        if ($student == null) {
            return "Student not found";
        }
        $studentProgress =Progress::where('student_id',$student_id)->get();

        return view('university_employee.supervisor.progress', compact('supervisor', 'student','studentProgress','allStudents'));
        
    }
    public function showEvaluateStudentPage($user_id,$student_id)
    {
        $supervisor=UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($user_id);//role_id = ??
        if ($supervisor==null) {
            return "supervisor not found ";
        }
        $allStudents=$supervisor->students();
        $student = $allStudents->find($student_id);

        if ($student == null) {
            return "Student not found";
        }
        // company rmployee should be trainier in training table ?
        $trainer = $student->training->employee;
        $training = $student->training;
        $evaluateStudent =$student->evaluate_student;

        return view('university_employee.supervisor.evaluateStduent',compact('supervisor','student','trainer','training','evaluateStudent'));
        
    }

}