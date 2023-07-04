<?php

namespace App\Http\Controllers\UniversityEmployee\Supervisor;

use App\Models\UniversityEmployee;
use App\Models\Progress;
use App\Models\EvaluateCompany;
use App\Models\EvaluateStudent;
use App\Models\Student;
use App\Models\Student_spoken_language;
use App\Models\Student_skill;
use App\Models\Preferred_training_field_student;
use App\Models\Preferred_cities_student;

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
        $allStudents=$supervisor->students();
        $student = $allStudents->find($student_id);

        if ($student == null) {
            return "Student not found";
        }
        $studentProgress =Progress::where('student_id',$student_id)->get();

        return view('university_employee.supervisor.progress', compact('supervisor', 'student','studentProgress'));
        
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
        // $studentEvalute =EvaluateStudent::where('student_id',$student_id)->get();

        return view('university_employee.supervisor.studentEvaluate', compact('supervisor', 'student','studentEvalute'));
        
    }

        /**
     * Method show_student_profile
     *
     * @param $user_id $user_id [explicite description]
     * @param $student_id $student_id [explicite description]
     *
     * @return void
     */
    public function show_student_profile($user_id, $student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student =Student::find($student_id);
          // many to many relationship
        $allLanguages = Student_spoken_language::with('student', 'spokenLanguage')->where('student_id',$student_id)->get();
        $allSkills = Student_skill::with('student', 'skill')->where('student_id',$student_id)->get();
        $allPreferredTrainingFields = Preferred_training_field_student::with('student', 'preferredTrainingField')->where('student_id',$student_id)->get();
        $allPreferredCities = Preferred_cities_student::with('student', 'city')->where('student_id',$student_id)->get();

      //   one to many
        $specializationName = $student->specialization->name;

      
        return view('university_employee.supervisor.student_profile',compact('user', 'student','specializationName','allLanguages','allSkills','allPreferredTrainingFields','allPreferredCities'));  
    }
}