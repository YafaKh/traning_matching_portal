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
    public function filterStudents(Request $request, $user_id)
    {
        $query = Student::query();
        $specializations = Specialization::all();
        // $company = Company::all();

        if ($request->ajax()) {
            if (empty($request->specialization)) {//this part of code not working , it must return the previous data when i don't choose a sepcefication 
                $students = $query->where('university_employee_id', $user_id)->with('specialization')->get();
            } else {
                $students = $query->where([
                    'specialization_id' => $request->specialization,
                    'university_employee_id' => $user_id
                ])->with('specialization')->get();
            }
    
            // Prepare the response data
            $responseStudents = $students->map(function ($student) {
                $semester = $student->training ? $student->training->semester : '';
                if ($semester == 1) {
                    $semester = 'Fall';
                }
                elseif($semester == 2){
                    $semester = 'Spring';
                }
                elseif($semester == 3){
                    $semester = 'First Summer';
                } 
                elseif($semester == 4){
                    $semester = 'Second Summer';
                } 
            
                return [
                    'student_num' => $student->student_num,
                    'first_name_en' => $student->first_name_en,
                    'specialization_acronyms' => $student->specialization ? $student->specialization->acronyms : '',
                    'company_name' => $student->training->branch->company ? $student->training->branch->company->name : '',
                    'branch_name' => $student->training->branch ? $student->training->branch->address : '',
                    'training_semester' => $semester,
                    'training_year' => $student->training ? $student->training->year : '',
                    'trainer_first_name' => $student->training->employee ? $student->training->employee->first_name : '',
                    'trainer_last_name'  => $student->training->employee ? $student->training->employee->last_name : '',
                ];
            });
    
            return response()->json(['students' => $responseStudents]);
        }
    
        $students = $query->where('user_id', $user_id)->with('specialization')->get();
    
        return view('university_employee.supervisor.listStudents', compact('specializations', 'students','user_id'));
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
        $student =Student::find($student_id);
          // many to many relationship
        $allLanguages = Student_spoken_language::with('student', 'spokenLanguage')->where('student_id',$student_id)->get();
        $allSkills = Student_skill::with('student', 'skill')->where('student_id',$student_id)->get();
        $allPreferredTrainingFields = PreferredTrainingField::with('student', 'preferredTrainingField')->where('student_id',$student_id)->get();
        $allPreferredCities = PreferredCity::with('student', 'city')->where('student_id',$student_id)->get();

      //   one to many
        $specializationName = $student->specialization->name;

      
        return view('university_employee.supervisor.student_profile',compact('user', 'student','specializationName','allLanguages','allSkills','allPreferredTrainingFields','allPreferredCities'));  
    }
}