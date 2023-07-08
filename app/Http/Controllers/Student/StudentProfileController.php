<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Specialization;
use App\Models\Skill;
use App\Models\PreferredTrainingField;
use App\Models\PreferredCities;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentProfileController extends Controller
{
   
    public function show($user_id){
          $user =Student::find($user_id);
          $student= $user;
           // many to many relationship
            $allSkills = $student->skills;
            $allPreferredTrainingFields = $student->preferredTrainingFields;
            $allPreferredCities = $student->cities;
          //   one to many
            $specializationName = $student->specialization->name;
            
          return view('student.profile',compact('user', 'student','specializationName','allSkills','allPreferredTrainingFields','allPreferredCities'));  
    }
}
