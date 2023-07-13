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
        $cities=City::all();
        $trainingFields=PreferredTrainingField::all();

        return view('student.edit_profile',compact('user','specializations','skills','companies','cities','trainingFields'));
    }
    

    public function update(Request $request,$user_id)
    {
        $student = Student::find($user_id);
        $request->validate([
            'name' => 'required|max:45',
            'gender' => 'required|boolean',
            'passed_hours' => 'nullable|integer',
            'gpa' => 'nullable',
            'load' => 'required|integer|min:0|max:18',
            'email' => 'required|email|unique:students',
            'linkedin' => 'required|url',
            'english_level' => 'required|min:1|max:5',
            'skills' => 'array',
            'availability_date' => 'required|date',
            'connected_with_a_company' => 'required|boolean',
            'phone' => 'required|string|regex:/^+[0-9]{13}$/',//+972 123 456 789
            'work_experience' => 'nullable|string|max:65535',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10000000',

        ]);
        // Update the student data based on the form inputs
        // $student->first_name_en = $request->input('first_name_en');
        // $student->second_name_en = $request->input('second_name_en');
        // $student->third_name_en = $request->input('third_name_en');
        // $student->last_name_en = $request->input('last_name_en');
        $student->name = $request->input('name');
        $student->gender = $request->input('gender');
        $student->passed_hours = $request->input('passed_hours');
        $student->gpa = $request->input('gpa');
        $student->load = $request->input('load');
        $student->email = $request->input('email');
        $student->linkedin = $request->input('linkedin');
        $student->english_level = $request->input('english_level');
        $student->availability_date = $request->input('availability_date');
        $student->connected_with_a_company = $request->input('connected_with_a_company');
        $student->phone = $request->input('phone');
        $student->image = $request->input('image');
        $student->work_experience = $request->input('work_experience');

        // $student->specialization = $request->input('specialization');
        // Save the updated data
        $student->save();

        return redirect()->route('student_profile', ['user_id' => $user_id]);
    }
    // .............
}
    // public function edit($user_id, $trainee_id, $progress_id)
//     {
//         $user = CompanyEmployee::findOrFail($user_id);
//         $trainee = Student::findOrFail($trainee_id);
//         $progress = Progress::findOrFail($progress_id);
//         $trainingID =$trainee->training_id;//ex : 8 -get student training
//         $allTrainings=$user->trainings()->where('id', $trainingID)->get();

//         foreach ($allTrainings as $training) {
        
//         return view('company_employee.trainer.trainees.edit_progress', compact('user', 'trainee', 'progress','training'));
//     }
// }
//     public function update(Request $request, $user_id, $trainee_id, $progress_id)
// {
//     $request->validate([
//         'week' => 'required|string',
//         'end_date' => 'required|date',
//         'passed_hours' => 'required|integer',
//         'absences_days' => 'required|integer',
//         'note' => 'nullable|max:155|string',
//     ]);

//     Progress::where('id',$progress_id)->update([
//         'week' =>$request->week,
//         'end_date' =>$request->end_date,
//         'passed_hours' =>$request->passed_hours,
//         'absences_days' =>$request->absences_days,
//         'note' =>$request->note,
//     ]);

//     return redirect()->route('fill_traniee_progress', ['user_id' => $user_id, 'trainee_id' => $trainee_id]);
//     }
