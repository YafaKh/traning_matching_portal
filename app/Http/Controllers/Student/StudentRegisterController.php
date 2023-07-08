<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Spoken_language;
use App\Models\Specialization;
use App\Models\Student_spoken_language;
use App\Models\Skill;
use App\Models\Company;
use App\Models\City;
use App\Models\PreferredTrainingField;
use App\Models\CompanyBranch;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Validation\Rule;


class StudentRegisterController extends Controller
{
    public $selectedCompany="null";
    public function create(){
        $specializations = Specialization::all();
        $skills = Skill::all();
        $companies = Company::all();
        $branches=CompanyBranch::all();
        $cities=City::all();

        $trainingFields=Preferred_training_field::all();
       return view('student.register',compact('specializations','skills','companies','cities','trainingFields','branches'));

    }
    public function store(Request $request)
    {
        // Validation
        $validated = $request->validate([
            'student_num' => 'required|string',
            'first_name_ar' => 'required|string|max:15',
            'first_name_en' => 'required|string|max:15',
            'second_name_ar' => 'required|string|max:15',
            'second_name_en' => 'required|string|max:15',
            'third_name_ar' => 'required|string|max:15',
            'third_name_en' => 'required|string|max:15',
            'last_name_ar' => 'required|string|max:15',
            'last_name_en' => 'required|string|max:15',
            'gender' => 'required|boolean',
            'passed_hours' => 'required|integer',
            'load' => 'required|integer|min:0|max:18',
            'gpa' => 'required',
            'email' => 'required|email|unique:students',
            'linkedin' => 'required|url',
            'password' => 'required|string|min:8|confirmed',
            'english_level' => 'required|min:1|max:5',
            'skills' => 'array',
            'availability_date' => 'required|date',
            'connected_with_a_company' => 'required|boolean',
            'phone' => 'required|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10000000',
            'work_experience' => 'nullable|string|max:65535',
            'other_skills' => 'nullable|string',
            'other_fields' => 'nullable|string',
            'city' => 'required',
            'specialization' => 'required',
            'trainingFields' => 'array',
            'company' => 'nullable',
            'preferrdCompany' => 'nullable|array',
            'preferrdCompany.*' => 'nullable',
            'preferrdCities' => 'nullable|array',
            'preferrdCities.*' => 'nullable',
        ]);
        $validated['password'] = Hash::make($validated['password']);
    
        // Create the student record
        $student = Student::create([
            'student_num' => $validated['student_num'],
            'first_name_ar' => $validated['first_name_ar'],
            'first_name_en' => $validated['first_name_en'],
            'second_name_ar' => $validated['second_name_ar'],
            'second_name_en' => $validated['second_name_en'],
            'third_name_ar' => $validated['third_name_ar'],
            'third_name_en' => $validated['third_name_en'],
            'last_name_ar' => $validated['last_name_ar'],
            'last_name_en' => $validated['last_name_en'],
            'gender' => $validated['gender'],
            'passed_hours' => $validated['passed_hours'],
            'load' => $validated['load'],
            'gpa' => $validated['gpa'],
            'email' => $validated['email'],
            'linkedin' => $validated['linkedin'],
            'password' => $validated['password'],
            'english_level' => $validated['english_level'],
            'availability_date' => $validated['availability_date'],
            'connected_with_a_company' => $validated['connected_with_a_company'],
            'phone' => $validated['phone'],
            'work_experience' => $validated['work_experience'],
            'city_id' => $validated['city'],
            'specialization_id' => $validated['specialization'],
            'university_id' => 1,
        ]);
    
        // Store the profile image if provided
        if ($request->hasFile('image')) {
            $imagePath = $this->storeImage($request->file('image'), $student->id);
            $student->image = $imagePath;
            $student->save();
        }
    
        // Handle skills
        $selectedSkills = $request->input('skills', []);
        $newSkills = [];
    
        if ($request->filled('other_skills')) {
            $otherSkills = explode(',', $request->input('other_skills'));
    
            foreach ($otherSkills as $skillName) {
                $skillName = trim($skillName);
    
                if (!empty($skillName)) {
                    $skill = Skill::firstOrCreate(['name' => $skillName]);
                    $selectedSkills[] = $skill->id;
                    $newSkills[] = $skill;
                }
            }
        }
    
        $student->skills()->attach($selectedSkills);
    
        // Handle training fields
        $selectedTrainingFields = $request->input('trainingFields', []);
        $newTrainingFields = [];
    
        if ($request->filled('other_fields')) {
            $otherFields = explode(',', $request->input('other_fields'));
    
            foreach ($otherFields as $fieldName) {
                $fieldName = trim($fieldName);
    
                if (!empty($fieldName)) {
                    $field = Preferred_training_field::firstOrCreate(['name' => $fieldName]);
                    $selectedTrainingFields[] = $field->id;
                    $newTrainingFields[] = $field;
                }
            }
        }
    
        $student->preferredTrainingFields()->attach($selectedTrainingFields);
    
        // Handle preferred companies
        $selectedPreferredCompanies = $request->input('preferrdCompany', []);
        $student->preferredCompanies()->attach($selectedPreferredCompanies);
    
        // Handle preferred cities
        $selectedPreferredCities = $request->input('preferrdCities', []);
        $student->preferredCities()->attach($selectedPreferredCities);
    
        return redirect()->route('user_type');
    }    

   /**
     * store image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function storeImg(Request $request, $student_id)
    {
        $newImgName= 'stu_'.$student_id .'.'.$request->image->extension();
        return $request->image->move(public_path('assets\img'),$newImgName);     
    }

}