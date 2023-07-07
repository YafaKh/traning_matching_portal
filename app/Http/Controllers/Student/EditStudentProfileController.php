<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Student;
use App\Models\City;
use App\Models\Skill;
use App\Models\Student_skill;
use App\Models\Spoken_language;
use App\Models\Preferred_training_field;

class EditStudentProfileController extends Controller
{
    //
    public function show($id){
        $student =Student::find($id);
        $cities=City::all();
        $skills = Skill::all();
        $spokenLanguages = Spoken_language::all();
        $trainingFields = Preferred_training_field::all();
        $company= $student->training->branch->company;
        if($company == null) return "not found";
        else 

        return view('student.edit_profile',compact('student','cities','skills','spokenLanguages','trainingFields','company'));
    }
    // public function update(Request $request)
    // {
    //     $student = Student::find($id);
    //     // Update the student data based on the form inputs
    //     $student->name = $request->input('name');
    //     $student->specialization = $request->input('specialization');
    //     $student->email = $request->input('email');
    //     $student->phone = $request->input('phone');
    //     $student->linkedin = $request->input('linkedin');
    //     // Save the updated data
    //     $student->save();

    //     // Redirect or return a response
    // }
}
