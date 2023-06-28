<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator;
use App\Http\Controllers\Controller;
use App\Models\UniversityEmployee;
use App\Models\UnaddedUniversityEmployee;

use Illuminate\Http\Request;


class UniversityEmployeeController extends Controller
{
    /**
     * Display a listing of the employees.
     */
    public function index($user_id)
    {
        $user = UniversityEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name')->first();

        $university_employees= UniversityEmployee::select([
        'id', 'employee_num', 'first_name', 'last_name','email', 'phone', 'university_employee_role_id'])
        ->where('active',1)->defaultOrder()->get();
        
        return view('university_employee.coordinator.university_employees.list',
        ['user' => $user,
        'university_employees'=>$university_employees]);
    }
    
    /**
     * Show the form for adding a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $user = UniversityEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name', 'university_employee_role_id')->first();

        $un_added_employees = UnaddedUniversityEmployee::select(
            'id', 'email', 'first_name', 'last_name')->get();

        return view('university_employee.coordinator.university_employees.add',
        ['user' => $user,
        'un_added_employees' => $un_added_employees]);
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $request->validate([
            'email'=> 'required|exists:unadded_university_employees,id',
            'role'=> 'required|exists:university_employee_roles,id'
        ]);

        $unadded_employee = UnaddedUniversityEmployee::find($request->input('email'));

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
            'university_employee_role_id' =>$request->input('role')
        ]);
    
        // Delete the unadded employee
        $unadded_employee->delete();
        return redirect()->route('coordinator_add_employee', $user_id);
    }
    /**
     * Method updateRole
     *
     * @param Request $request [explicite description]
     *
     * @return void
     */
    public function update_role(Request $request, $user_id, $employee_id)
    {
         $employee=  UniversityEmployee::findOrFail($employee_id);
         $request->validate([
            'role'=> 'exists:university_employee_roles,id'
        ]);
         $employee->university_employee_role_id = $request->input('role'); 
         $employee->save(); 
         return redirect()->route('coordinator_list_employees', $user_id);
    }
     /**
     * Remove the specified resource from storage.
     * this mehod will set all assosiated fk.s in children to null(students)
     */
    public function destroy($user_id, $employee_id)
    {
        $universityEmployee=  UniversityEmployee::findOrFail($employee_id);
        $universityEmployee->active = 0; // Set the "active" column to 0
        $universityEmployee->save();
        return redirect()->route('coordinator_list_employees', $user_id);
    }
}
