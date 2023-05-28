<?php

namespace App\Http\Controllers\CompanyEmployee\HR;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\CompanyEmployee;
use App\Models\Company;
use App\Models\UnaddedCompanyEmployee;

class CompanyEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($company_id)
    {
        //to edit trainees, edit role and delete
        $employees_data= CompanyEmployee::
        select('first_name', 'last_name', 'phone', 'email', 'company_employee_role_id')
        ->where('company_id', $company_id)->get();
        return view('company_employee.hr.company_employees.list',
        ['employees_data'=>$employees_data,
         'company_id' => $company_id]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($company_id)
    {
        $un_added_employees = UnaddedCompanyEmployee::where(
        'company_id', $company_id)->get();

        return view('company_employee.hr.company_employees.add',
        ['un_added_employees' => $un_added_employees,
        'company_id' => $company_id]);
        //to edit: pass onle email
    }

    /**
     * Store a newly created resource in storage.
     */
    
    public function store(Request $request, $company_id)
    {
        $employee= UnaddedCompanyEmployee::where('id', $request->employee)->first();
        CompanyEmployee::create([
            'email' => $employee->email,
            'password' => $employee->password,
            'phone' => $employee->phone,
            'first_name' => $employee->first_name,
            'second_name' => $employee->second_name,
            'third_name' => $employee->third_name,
            'last_name' => $employee->last_name,
            'image' => $employee->image,
            'company_id' => $employee->company_id,
            'company_employee_role_id' => $request->role
        ]);
        $employee->delete();
        return redirect()->route('hr_add_Employee', ['company_id' => $company_id]);
    }

    /**
     * Update the specified resource in storage.
     * In practice, the coordinator is only allowed to update the employee's role
     */
    public function update(Request $request, string $id)
    {//to edit update contact person
        $request->validate();
        $universityEmployee=UniversityEmployee::where('id',$id)->first();
        $universityEmployee->update([$request->input('company_role_id')]);

        
            // Sync the employee's role and company
            $employee->roles()->sync($request->company_employee_role_id);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $universityEmployee=  UniversityEmployee::where('id',$id)->first();
        $universityEmployee->delete();
        index();
    }
}
