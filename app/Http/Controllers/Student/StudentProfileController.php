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
   
    public function show($id){
          $student =Student::find($id);
          $students =Student::select('id')->get();
            // many to many relationship
          $allLanguages = Student_spoken_language::with('student', 'spokenLanguage')->get();
          $allSkills = Student_skill::with('student', 'skill')->get();
          $allPreferredTrainingFields = Preferred_training_field_student::with('student', 'preferredTrainingField')->get();
          $allPreferredCities = Preferred_cities_student::with('student', 'city')->get();

        //   one to many
          $specializationName = $student->specialization->name;

        //   $skills = $student->skills;
        //   $allSkills = Skill::select('id','name')->get();
          
        //   $preferred_training_fields = $student->preferred_training_fields;
        //   $allpreferredTrainingFields = Preferred_training_field::select('id','name')->get();
          
          return view('student.profile',compact('student','specializationName','allLanguages','allSkills','allPreferredTrainingFields','allPreferredCities'));
//           return view('student.profile',compact('student','specializationName','skills','spoken_languages','students','allLanguages','allSkills','allpreferredTrainingFields'));


      //     
    }
     
}
