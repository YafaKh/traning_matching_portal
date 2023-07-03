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
    public function index($id)
    {
        $supervisor=UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($id);//role_id = ??
        if ($supervisor==null) {
            return "supervisor not found ";
        }
        $allStudents=$supervisor->students()->paginate(10);

        return view('university_employee.supervisor.students',compact('supervisor','allStudents'));//,['students'=>$studentsData]);
    }
    public function showProgressPage($id,$student_id)
    {
        $supervisor=UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($id);//role_id = ??
        if ($supervisor==null) {
            return "supervisor not found ";
        }
        $allStudents=$supervisor->students();
        $student = $allStudents->find($student_id);

        if ($student == null) {
            return "Student not found";
        }
        $studentProgress =Progress::where('student_id',$student_id)->get();

        return view('university_employee.supervisor.progress', compact('supervisor', 'student','studentProgress'));
        
    }
    public function showEvaluateStudentPage($id,$student_id)
    {
        $supervisor=UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($id);//role_id = ??
        if ($supervisor==null) {
            return "supervisor not found ";
        }
        $allStudents=$supervisor->students();
        $student = $allStudents->find($student_id);

        if ($student == null) {
            return "Student not found";
        }
        // $studentEvalute =EvaluateStudent::where('student_id',$student_id)->get();

        return view('university_employee.supervisor.studentEvaluate', compact('supervisor', 'student','studentEvalute'));
        
    }
}