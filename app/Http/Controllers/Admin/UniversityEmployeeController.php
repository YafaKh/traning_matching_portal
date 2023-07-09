<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\universityEmployee;
use App\Models\UnaddedUniversityEmployee;

class UniversityEmployeeController extends Controller
{    
    /**
     * Method index
     *
     * @return void
     */
    public function index(){
        $employees = universityEmployee::all();
        return view('admin.university_employees', ['employees'=>$employees]);
    }    
    /**
     * Method add
     *this method will be used to add just the first registered university emp
     * @return void
     */
    public function add(){
        $employees = UnaddedUniversityEmployee::all();
        return view('admin.add_university_employee', ['employees'=>$employees]);
    }
        /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $unadded_employee = UnaddedUniversityEmployee::find($request->input('employee'));

        // Create a new university employee
        UniversityEmployee::create([
            'first_name' =>  $unadded_employee->first_name,
            'second_name' =>  $unadded_employee->second_name,
            'third_name' =>  $unadded_employee->third_name,
            'last_name' =>  $unadded_employee->last_name,
            'phone' => $unadded_employee->phone,
            'email' => $unadded_employee->email,
            'employee_num' => $unadded_employee->employee_num,
            'password' => $unadded_employee->password,
            'university_employee_role_id' =>3
        ]);
    
        // Delete the unadded employee
        $unadded_employee->delete();
        return redirect()->route('admin_university_employees');
    }
}
