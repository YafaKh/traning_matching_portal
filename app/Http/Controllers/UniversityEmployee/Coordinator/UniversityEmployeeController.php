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
    public function index()
    {
        //to edit: add img
        $university_employees= UniversityEmployee::select([
        'id', 'employee_num', 'first_name', 'last_name','email', 'phone', 'university_employee_role_id'])->defaultOrder()->get();
        
        return view('university_employee.coordinator.university_employees.list',['university_employees'=>$university_employees]);
    }
    
    /**
     * Update the specified employee's role
     */
    public function update_role(Request $request, string $id)
    {
        $request->validate();
        $universityEmployee=UniversityEmployee::where('id',$id)->first();
        $universityEmployee->update([$request->input('company_role_id')]);
    }

        /**
     * Show the form for adding a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $un_added_employees = UnaddedUniversityEmployee::select(
            'id', 'email')->get();

        return view('university_employee.coordinator.university_employees.add',
        ['un_added_employees' => $un_added_employees]);
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
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
        return redirect()->route('coordinator_add_employee');
    }

     /**
     * Remove the specified resource from storage.
     * this mehod will set all assosiated fk.s in children to null(students)
     */
    public function destroy($employee_id)
    {
        $companyEmployee=  UniversityEmployee::findOrFail($employee_id);
        $companyEmployee->delete();
        return redirect()->route('coordinator_list_employees');
    }
}
