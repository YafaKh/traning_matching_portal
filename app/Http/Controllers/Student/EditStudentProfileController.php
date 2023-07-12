<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Student;
use App\Models\City;
use App\Models\Skill;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\PreferredTrainingField;
use App\Models\Specialization;

class EditStudentProfileController extends Controller
{
    //
    public function show($user_id){
        $user =Student::find($user_id);
        $specializations = Specialization::all();
        $skills = Skill::all();
        $companies = Company::all();
        $branches=CompanyBranch::all();
        $cities=City::all();
        $trainingFields=PreferredTrainingField::all();

        return view('student.edit_profile',compact('user','specializations','skills','companies','cities','trainingFields','branches'));
    }
    public function edit(Request $request)
    {
        $student = Student::find($id);
        // Update the student data based on the form inputs
        $student->name = $request->input('name');
        $student->specialization = $request->input('specialization');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->linkedin = $request->input('linkedin');
        $student->image = $request->input('image');

        // Save the updated data
        $student->save();

        // Redirect or return a response
    }
}
