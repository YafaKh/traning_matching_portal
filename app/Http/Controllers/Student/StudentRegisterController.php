<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Spoken_language;
use App\Models\Specialization;
use App\Models\Student_spoken_language;
use App\Models\Skill;
use App\Models\Company;
use App\Models\City;
use App\Models\Preferred_cities_student;
use App\Models\Preferred_training_field;
use App\Models\CompanyBranch;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentRegisterController extends Controller
{
    public $selectedCompany="null";
    public function create($id){
        // $data=Student::get();
        // return view('student.register',['Studentkey'=>$data]);
        $student =Student::find($id);

        // $spoken_languages = $student ->spoken_languages;
        // $students =Student::select('id')->get();
        // $allLanguages = Spoken_language::select('id','name')->get();
        // $allLanguages = Student_spoken_language::with('student', 'spokenLanguage')->where('student_id',$id)->get();
        $allLevels = Student_spoken_language::all();
                // $allLanguages = Student_spoken_language::with('student', 'spokenLanguage')->where('student_id',$id)->get();
        $allLanguages = Spoken_language::all();
        $specializations = Specialization::all();
        $skills = Skill::all();
       $companies = Company::all();
        $branches=CompanyBranch::all();
        // dd($companyid = $student->training->branch->);
        // $companiesBranches = Company::with('student', 'companies')->where('student_id',$id)->get();
        $cities=City::all();
        // dd($branches->$cities->name);
        // $branchesCity = CompanyBranch::with('city', 'city')->where('student_id',$id)->get();

        $trainingFields=Preferred_training_field::all();
       return view('student.register',compact('student','allLanguages','allLevels','specializations','skills','companies','cities','trainingFields','branches'));

    }
    
    // public class updateSelectedbranch(){

    // }
    public function store(Request $request){ 
        dd($request->all());
        // vlidation
        $validated = $request->validate([            
            'student_num' => 'required|string',
            'first_name_ar'=>'required|string|max:15',
            'first_name_en'=>'required|string|max:15',
            'second_name_ar'=>'required|string|max:15',
            'second_name_en'=>'required|string|max:15',
            'third_name_ar'=>'required|string|max:15',
            'third_name_en'=>'required|string|max:15',
            'last_name_ar'=>'required|string|max:15',
            'last_name_en'=>'required|string|max:15',
            'gender' =>'required|boolean',
            'passed_hours' =>'required|integer',//min ??
            'load' =>'required|integer|min:0|max:18',
            'gpa' =>'required|max:4|between:2.00,4.00|regex:/^[0-4]\.\d\d$/',//lowest gpa ??
            'address'=>'required|string',
            'email'=>'required|email|unique:students',
            'linkedin' =>'required|url',
            'password'=>'required|string|min:8|regex:/^[0-9a-zA-Z][@$!%*#?&]$/|confirmed',//must have a character or number && special character
            'availability_date'=>'required|date',
            'connected_with_a_company'=>'required|boolean',
            // 'connected_company_info'=>'required|string|max:512',//name + branch
            'phone'=>'required|string|regex:/^+[0-9]{13}$/',
            // 'registered'=>'required|boolean',// must i write a default value here ?
            'image'=>'required|image',
// 'avatar' => 'dimensions:min_width=100,min_height=200' for img
// 'image' => 'file|size:512';
            'work_experience'=>'required|string|max:512',

          ]);
        //  $input = $request -> all();
        //  $cities =$input['cities'];
        //  $input['cities'] = implode(' , ',$cities);
        //  Preferred_cities_student::create([
        //     // student-id 
        //     //city-id
        //  ]);
         
        // insert
        $student = Student::create([
            'student_num' => $request->input('student_num'),
            'first_name_ar'=> $request->input('first_name_ar'),
            'first_name_en'=> $request->input('first_name_en'),
            'second_name_ar'=> $request->input('second_name_ar'),
            'second_name_en'=> $request->input('second_name_en'),
            'third_name_ar'=> $request->input('third_name_ar'),
            'third_name_en'=> $request->input('third_name_en'),
            'last_name_ar'=> $request->input('last_name_ar'),
            'last_name_en'=> $request->input('last_name_en'),
            'gender' => $request->input('gender') === 'on',
            'passed_hours' => $request->input('passed_hours'),
            'load' => $request->input('load'),
            'gpa' => $request->input('gpa'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'linkedin' => $request->input('linkedin'),
            'password' => $request->input('password'),
            'availability_date' => $request->input('availability_date'),
            'connected_with_a_company' => $request->input('connected_with_a_company'),
            'connected_company_info' => $request->input('connected_company_info'),
            'phone' => $request->input('phone'),
            'registered' => $request->input('registered'),
            'image' => $this->storeImage($request),
            'work_experience' => $request->input('work_experience'),
            // 'university_id'=>$request ->input('university_id'),
            // 'university_employee_id'=>$request ->input('university_employee_id'),
            'specialization_id'=>$request ->input('specialization_id'),
            // 'training_id'=>$request ->input('training_id'),
            // 'evaluate_student_id'=>$request ->input('evaluate_student_id'),
            // 'evaluate_company_id'=>$request ->input('evaluate_company_id'),

         ]);
       

        return redirect(route('student_registeration_1'));
    }


    private function storeImage($request){
        // to store the image
        $newImageName = uniqid() . '-' . $request->student_num . '-' . 
        $request->image->extension();

        return $request->image->move(public_path('images'),$newImageName);
    } 



    // add multi language for a spacific student

public function testStore(Request $request)
{
    // Create a new student
    $student = new Student();
    // Populate other student attributes

    $student->save();

    // Attach spoken languages with levels
    // $languageRangs = $request->input('languageRang');
    // if ($languageRangs) {
    //     foreach ($languageRangs as $languageID => $levels) {
    //         $spokenLanguage = Spoken_language::find($languageID);
    //         if ($spokenLanguage) {
    //             $student->spoken_languages()->attach($spokenLanguage, [
    //                 'listening_level' => $levels['listening_level'],
    //                 'writing_level' => $levels['writing_level'],
    //                 'speaking_level' => $levels['speaking_level'],
    //             ]);
    //         }
    //     }
    // }

    // Other save logic or redirect
}

}