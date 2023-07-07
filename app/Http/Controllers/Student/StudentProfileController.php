<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Spoken_language;
use App\Models\Specialization;
use App\Models\Skill;
use App\Models\Preferred_training_field;
use App\Models\Student_spoken_language;
use App\Models\Student_skill;
use App\Models\Preferred_training_field_student;
use App\Models\Preferred_cities_student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentProfileController extends Controller
{
   
    public function show($user_id){
          $user =Student::find($user_id);
          $users =Student::select('id')->get();//?
            // many to many relationship
          $allLanguages = Student_spoken_language::with('student', 'spokenLanguage')->where('student_id',$user_id)->get();
          $allSkills = Student_skill::with('student', 'skill')->where('student_id',$user_id)->get();
          $allPreferredTrainingFields = Preferred_training_field_student::with('student', 'preferredTrainingField')->where('student_id',$user_id)->get();
          $allPreferredCities = Preferred_cities_student::with('student', 'city')->where('student_id',$user_id)->get();

        //   one to many
          $specializationName = $user->specialization->name;

          $company_data= $user->training->branch->company;
          if($company_data == null) return "not found";
          else 
          return view('student.profile',compact('user','specializationName','allLanguages','allSkills','allPreferredTrainingFields','allPreferredCities','company_data'));  
    }
}
