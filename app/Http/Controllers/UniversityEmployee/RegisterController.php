<?php

namespace App\Http\Controllers\UniversityEmployee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnaddedUniversityEmployee;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    /**
     * Show the University Employee registeration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('university_employee.register');
    }

    /**
     * Store a newly created University Employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {            

        //check data validation
        $validatedData=$request->validate([
            'first_name' => 'required|alpha|between:2,20',
            'second_name' => 'required|alpha|between:2,20',
            'third_name' => 'required|alpha|between:2,20',
            'last_name' => 'required|alpha|between:2,20',
            'employee_num' => 'required|unique:university_employees,email|max:25',
            'phone' => 'required',
            'email'=> 'required|email|unique:university_employees,email|max:255',
            'password' => 'required|min:8|confirmed:confirm_password',
        ]);     
        $validatedData['password'] = Hash::make($validatedData['password']);
        UnaddedUniversityEmployee::create($validatedData);           

        return redirect()->route('user_type');
   }

}
