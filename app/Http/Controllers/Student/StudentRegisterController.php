<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Spoken_language;
use App\Models\Specialization;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;


class StudentRegisterController extends Controller
{
    public function create($id){
        // $data=Student::get();
        // return view('student.register',['Studentkey'=>$data]);
        $student =Student::find($id);
        $spoken_languages = $student ->spoken_languages;
        $students =Student::select('id')->get();
        $allLanguages = Spoken_language::select('id','name')->get();
       return view('student.register',compact('spoken_languages','students','allLanguages'));

    }
    public function createNextPage(){
        return view('student.register2');

    }   
    public function store(Request $request){ 
        
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
            'passed_hours' =>'required|numeric',
            'gpa' =>'required|max:4|between:0.00,4.00|regex:/^[0-4]\.\d\d$/',
            'address'=>'required|string',
            'email'=>'required|email|unique:students',//our uni email
            'password'=>'required|string|min:8|regex:/^[0-9a-zA-Z][@$!%*#?&]|confirmed',//must have a character or number && special character
            'availability_date'=>'required|date',
            'connected_with_a_company'=>'required|boolean',
            'connected_company_info'=>'required|string|max:512',
            'phone'=>'required|string|regex:/^+[0-9]{13}$/',
            'registered'=>'required|boolean',// must i write a default value here ?
            'image'=>'required|image',
// 'avatar' => 'dimensions:min_width=100,min_height=200' for img
// 'image' => 'file|size:512';

          ]);
         
        
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
            'gender' => $request->input('gender'),
            'passed_hours' => $request->input('passed_hours'),
            'gpa' => $request->input('gpa'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            // 'confirm_password' => $request->input('confirm_password'),
            'availability_date' => $request->input('availability_date'),
            'connected_with_a_company' => $request->input('connected_with_a_company'),
            'connected_company_info' => $request->input('connected_company_info'),
            'country_code' => $request->input('country_code'),//??
            'area_code' => $request->input('area_code'),//?
            'phone_no' => $request->input('phone_no'),
            'registered' => $request->input('registered'),
            'image' => $this->storeImage($request),

         ]);
       

        return redirect(route('student_registeration_2'));
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