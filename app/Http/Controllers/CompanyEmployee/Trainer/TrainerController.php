<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use App\Models\CompanyEmployee;
use App\Models\Student;
use App\Models\Student_spoken_language;
use App\Models\Student_skill;
use App\Models\Preferred_training_field_student;
use App\Models\Preferred_cities_student;
use App\Models\Progress;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function show($user_id){
        // return the emoloyee if he have company_employee_role_id = 2 or 3
        $user=CompanyEmployee::whereIn('company_employee_role_id', [2, 3])->find($user_id);
        if ($user==null) {
            return "Trainer not found ";
        }

        $allTrainees=$user->students()->paginate(10);
        $allTrainings=$user->trainings;
        
        return view('company_employee.trainer.trainees.list',compact('user','allTrainees','allTrainings'));
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
        $user = CompanyEmployee::where('id', $user_id)->first();
        $student =Student::find($student_id);
          // many to many relationship
        $allLanguages = Student_spoken_language::with('student', 'spokenLanguage')->where('student_id',$student_id)->get();
        $allSkills = Student_skill::with('student', 'skill')->where('student_id',$student_id)->get();
        $allPreferredTrainingFields = Preferred_training_field_student::with('student', 'preferredTrainingField')->where('student_id',$student_id)->get();
        $allPreferredCities = Preferred_cities_student::with('student', 'city')->where('student_id',$student_id)->get();

      //   one to many
        $specializationName = $student->specialization->name;

      
        return view('company_employee.hr.student_profile',compact('user', 'student','specializationName','allLanguages','allSkills','allPreferredTrainingFields','allPreferredCities'));  
    }

    public function showProgressPage($user_id,$student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
         $student = Student::where('id', $student_id)->first();

        if ($student == null) {
            return "Student not found";
        }
        $studentProgress =Progress::where('student_id',$student_id)->get();

        return view('company_employee.trainer.progress', compact('user', 'student','studentProgress'));

    }
}
