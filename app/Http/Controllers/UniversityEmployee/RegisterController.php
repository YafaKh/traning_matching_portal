<?php

namespace App\Http\Controllers\UniversityEmployee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnaddedUniversityEmployee;
use App\Models\UnaddedUniversity;
use App\Models\University;
use Illuminate\Support\Str;
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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10000000',
            'phone' => 'required',
            'email'=> 'required|email|unique:university_employees,email|max:255',
            'password' => 'required|min:8|confirmed:confirm_password',
        ]);     
        $validatedData['password'] = Hash::make($validatedData['password']);
        $employee = UnaddedUniversityEmployee::create($validatedData);   
        if(($request->hasFile('image')))
        {
            $image=Str::after($this->storeImg($request, $employee->id ),'img\\');
            $employee->update(['image' => $image]);
        }        

        return redirect()->route('user_type');
   }
    /**
     * store image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function storeImg(Request $request, $employee_id)
    {
        $newImgName= 'emp_'.$employee_id .'.'.$request->image->extension();
        return $request->image->move(public_path('assets\img'),$newImgName);     
    }

}
