<?php

namespace App\Http\Controllers\Student;
use Illuminate\Support\Str;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Student;
use App\Models\City;
use App\Models\Skill;
use App\Models\Company;
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
            'gender' => 'required|boolean',
            'passed_hours' => 'required|integer',
            'gpa' => 'required',
            'email' => 'required|email',
            'linkedin' => 'required|url',
            'english_level' => 'required|min:1|max:5',
            'new_skills' => 'nullable|string',
            'availability_date' => 'required|date',
            'phone' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10000000',
            'work_experience' => 'nullable|string|max:65535',
            'city' => 'required',
            'specialization' => 'required',
        ]);
        
     // Create the student record
     $student->update([
        'gender' => $request->input('gender'),
        'passed_hours' => $request->input('passed_hours'),
        'gpa' => $request->input('gpa'),
        'email' => $request->input('email'),
        'linkedin' => $request->input('linkedin'),
        'english_level' => $request->input('english_level'),
        'availability_date' => $request->input('availability_date'),
        'phone' => $request->input('phone'),
        'work_experience' => $request->input('work_experience'),
        'city_id' => $request->input('city'),
        'specialization_id' => $request->input('specialization'),
        
    ]);
        // Store the profile image if provided
        if ($request->hasFile('image')) {
            $image=Str::after($this->storeImg($request, $student->id ),'img\\');
            $student->image = $image;
            $student->save();
         }
        // // Handle skills
        // $newSkills = [];

        // if ($request->filled('new_skills')) {
        //     $new_skills = explode(',', $request->input('new_skills'));

        //     foreach ($new_skills as $skillName) {
        //         $skillName = trim($skillName);

        //         if (!empty($skillName)) {
        //             $skill = Skill::firstOrCreate(['name' => $skillName]);
        //             $newSkills[] = $skill;
        //         }
        //     }
        // }

        // $student->skills()->attach($newSkills);
        //  // Handle preferred companies
        // $selectedPreferredCompanies = $request->input('preferredCompany', []);
        // $student->preferredCompanies()->attach($selectedPreferredCompanies);

        // // Handle preferred cities
        // $selectedPreferredCities = $request->input('preferredCity', []);
        // $student->cities()->attach($selectedPreferredCities);

        // // Handle training fields
        // $selectedTrainingFields = $request->input('trainingFields', []);
        // $newTrainingFields = [];

        // if ($request->filled('other_fields')) {
        //     $otherFields = explode(',', $request->input('other_fields'));

        //     foreach ($otherFields as $fieldName) {
        //         $fieldName = trim($fieldName);

        //         if (!empty($fieldName)) {
        //             $field = PreferredTrainingField::firstOrCreate(['name' => $fieldName]);
        //             $selectedTrainingFields[] = $field->id;
        //             $newTrainingFields[] = $field;
        //         }
        //     }
        // }


        // // Update other fields
        // $student->preferredTrainingFields()->attach($selectedTrainingFields);

        // $student->availability_date = $request->input('availability_date');
      
        // // Save the updated data
      //  $student->save();

        return redirect()->route('student_profile', ['user_id' => $user_id]);
    } 
    private function storeImg(Request $request, $student_id)
    {
        $newImgName= 'stu_'.$student_id .'.'.$request->image->extension();
        return $request->image->move(public_path('assets\img'),$newImgName);     
    } 
}
   