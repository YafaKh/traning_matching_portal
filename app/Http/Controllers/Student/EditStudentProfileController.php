<?php

namespace App\Http\Controllers\Student;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Student;
use App\Models\City;
use App\Models\Skill;

class EditStudentProfileController extends Controller
{
    //
    public function show($id){
        $student =Student::find($id);
        $cities=City::all();
        $skills = Skill::all();
        
        return view('student.edit_profile',compact('student','cities','skills'));
    }
    public function update(Request $request)
    {
        $student = Student::find($id);
        // Update the student data based on the form inputs
        $student->name = $request->input('name');
        $student->specialization = $request->input('specialization');
        $student->address = $request->input('address');
        $student->email = $request->input('email');
        $student->phone = $request->input('phone');
        $student->linkedin = $request->input('linkedin');
        // Save the updated data
        $student->save();

        // Redirect or return a response
    }
}
