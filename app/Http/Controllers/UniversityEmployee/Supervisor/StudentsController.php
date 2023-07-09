<?php

namespace App\Http\Controllers\UniversityEmployee\Supervisor;

use App\Models\UniversityEmployee;
use App\Models\Progress;
use App\Models\EvaluateCompany;
use App\Models\EvaluateStudent;
use App\Models\Student;
use App\Models\Student_spoken_language;
use App\Models\Student_skill;
use App\Models\PreferredTrainingField;
use App\Models\PreferredCity;
use App\Models\Specialization;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\Training;


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
        $user=UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($user_id);//role_id = ??
        if ($user==null) {
            return "supervisor not found ";
        }
        $allStudents=$user->students()->paginate(10);

        $specializations =Specialization::all();
        $companies =Company::all();
        $branches =CompanyBranch::all();
        $trainings =Training::all();
        
        return view('university_employee.supervisor.listStudents',compact('user','allStudents','specializations','companies','branches','trainings'));
    }
    // public function filterStudents(Request $request)
    // {
    //     dd($specializationId = $request->input('specialization')); // Retrieve the selected specialization from the request
    
    //     // Perform the filtering based on the selected specialization
    //     $filteredStudents = Student::where('specialization_id', $specializationId)->get();
    // dd($filteredStudents);
    //     // Return the filtered students (e.g., as a view or JSON response)
    //     return view('university_employee.supervisor.listStudents', compact('filteredStudents'));
    // }
    public function filterStudents(Request $request)
    {
        $query =Student::query();
        $specializations =Specialization::all();

        if($request->ajax()){
        $students = $query->where(['specialization_id'=>$request->specialization])->get();
        return response()->json(['students'=>$students]);
        }
        $students = $query->get();
    
        return view('university_employee.supervisor.filtered-student', compact('specializations','students'));
    }
    
    public function showProgressPage($user_id,$student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        if ($user==null) {
            return "supervisor not found ";
        }

        $student = Student::where('id', $student_id)->first();


        if ($student == null) {
            return "Student not found";
        }
        $studentProgress =Progress::where('student_id',$student_id)->get();

        return view('university_employee.supervisor.progress', compact('user', 'student','studentProgress'));

    }
    public function showEvaluateStudentPage($user_id,$student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();

        $evaluation_data =$student->evaluate_student;
        return view('university_employee.supervisor.student_evaluation', 
        ['user'=>$user, 
        'student'=> $student,
        'evaluation_data'=>$evaluation_data]);        
    }
    public function showEvaluateCompnyPage($user_id,$student_id)
    {
        $user=UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($user_id);//role_id = ??
        if ($user==null) {
            return "supervisor not found ";
        }
        $allStudents=$user->students();
        $student = $allStudents->find($student_id);

        if ($student == null) {
            return "Student not found";
        }
        $companyName = $student->training->branch->company->name;
        $evaluateCompany = $student->evaluate_company;
        // $trainer = $student->training->employee;
        // $training = $student->training;
        // $evaluateStudent =$student->evaluate_student;

        return view('university_employee.supervisor.evaluateCompay',compact('user','student','companyName','evaluateCompany'));
        
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
        $student = Student::where('id', $student_id)->first();;
        return view('university_employee.supervisor.student_profile',compact('user','student'));  
     }
}