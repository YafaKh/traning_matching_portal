<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class StudentRegisterController extends Controller
{
    public function create(){
        return view('student.register');
    }
    public function createNextPage(){
        return view('student.register2');

    }
    public function store(Request $request){
   
        // dd($request->all());
    //  storing data into DB using ajax
//         $validated = $request->validate([            
//             'student_num' => 'required|string',
//             'gender' =>'required|boolean',
//             'passed_hours' =>'required|numeric',
//             'gpa' =>'required|max:4|between:0.00,4.00|regex:/^[0-4]\.\d\d$/',//regex:/^[1-4]{1}[0-9]{1,2}$/ may be it must strt with 1.00?
//             'address'=>'required|string',
//             'email'=>'required|email|unique:students',
//             'password'=>'required|string|min:8|regex:/^[0-9a-zA-Z][@$!%*#?&]',//must have a character or number && special character
//             'confirm_password' => 'required|same:password',//not in database
//             'availability_date'=>'required|date',
//             'connected_with_a_company'=>'required|boolean',
//             'connected_company_info'=>'required|string|max:512',
//             'phone_no'=>'required|string|regex:/^+[0-9]{13}$/',
//             'registered'=>'required|boolean',// must i write a default value here ?
//             'image'=>'required|image',
// // 'avatar' => 'dimensions:min_width=100,min_height=200' for img
// // 'image' => 'file|size:512';

//           ]);
         
        
        $student = Student::create([
            'student_num' => $request->input('student_num'),
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
       
//         //$customer->save();// i can use create insted of make & save method
//         // return redirect('/customers');  
        return redirect(route('student_registeration_2'));
    }


    private function storeImage($request){
$newImageName = uniqid() . '-' . $request->student_num . '-' . 
$request->image->extension();

return $request->image->move(public_path('images'),$newImageName);
} 

}