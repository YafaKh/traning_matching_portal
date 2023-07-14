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
        $validated = $request->validate([
            'first_name_en' => 'required|string',
            'second_name_en' => 'required|string',
            'third_name_en' =>'required|string',
            'last_name_en' => 'required|string',
            'gender' => 'required|boolean',
            'passed_hours' => 'required|integer',
            'gpa' => 'required',
            'email' => 'required|email|unique:students',
            'linkedin' => 'required|url',
            'english_level' => 'required|min:1|max:5',
            'skills' => 'array',
            'skills.*' => 'string',
            'other_skills' => 'nullable|string',
            'availability_date' => 'required|date',
            'phone' => 'required|string|regex:/^+[0-9]{13}$/',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10000000',
            'work_experience' => 'nullable|string|max:65535',
            'city' => 'required',
            'specialization' => 'required',
            'preferrdCities' => 'nullable|array',
            'preferrdCities.*' => 'nullable',
            'preferrdTrainingFiled' => 'nullable|array',
            'preferrdTrainingFiled.*' => 'nullable',
        ]);
     // Create the student record
     $student = Student::create([
        'first_name_en' => $validated['first_name_en'],
        'second_name_en' => $validated['second_name_en'],
        'third_name_en' => $validated['third_name_en'],
        'last_name_en' => $validated['last_name_en'],
        'gender' => $validated['gender'],
        'passed_hours' => $validated['passed_hours'],
        'gpa' => $validated['gpa'],
        'email' => $validated['email'],
        'linkedin' => $validated['linkedin'],
        'english_level' => $validated['english_level'],
        'availability_date' => $validated['availability_date'],
        'phone' => $validated['phone'],
        'work_experience' => $validated['work_experience'],
        'city_id' => $validated['city'],
        'specialization_id' => $validated['specialization'],
        
    ]);
        // Store the profile image if provided
        if ($request->hasFile('image')) {
            $imagePath = $this->storeImage($request->file('image'), $student->id);
            $student->image = $imagePath;
            $student->save();
        }

        // // Handle skills
        // $selectedSkills = $request->input('skills', []);
        // $newSkills = [];
    
        // if ($request->filled('other_skills')) {
        //     $otherSkills = explode(',', $request->input('other_skills'));
    
        //     foreach ($otherSkills as $skillName) {
        //         $skillName = trim($skillName);
    
        //         if (!empty($skillName)) {
        //             $skill = Skill::firstOrCreate(['name' => $skillName]);
        //             $selectedSkills[] = $skill->id;
        //             $newSkills[] = $skill;
        //         }
        //     }
        // }
        $student->skills()->attach($selectedSkills);

      
        // Save the updated data
        $student->save();

        return redirect()->route('student_profile', ['user_id' => $user_id]);
    } 
    private function storeImg(Request $request, $student_id)
        {
            $newImgName= 'stu_'.$student_id .'.'.$request->image->extension();
            return $request->image->move(public_path('assets\img'),$newImgName);     
        } 
}
   