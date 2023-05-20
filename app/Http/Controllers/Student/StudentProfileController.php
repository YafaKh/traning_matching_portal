<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Spoken_language;
use App\Models\Specialization;
use App\Models\Skill;
use App\Models\Preferred_training_field;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentProfileController extends Controller
{
    //activity louk
    public function show($id){
       dd(Student::with('spoken_languages')->find(7)->spoken_languages->pivot->speaking_level);
          $student =Student::find($id);
          $spoken_languages = $student ->spoken_languages;
          $students =Student::select('id')->get();
          $allLanguages = Spoken_language::select('id','name')->get();

          $specializationName = $student->specializations->name;
          
          $skills = $student->skills;
          $allSkills = Skill::select('id','name')->get();
          
          $preferred_training_fields = $student->preferred_training_fields;
          $allpreferredTrainingFields = Preferred_training_field::select('id','name')->get();
          
          return view('student.profile',compact('student','specializationName','skills','spoken_languages','students','allLanguages','allSkills','allpreferredTrainingFields'));


      //     
    }
     
}
