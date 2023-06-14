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
        select('id', 'first_name', 'last_name', 'phone', 'email', 'company_employee_role_id')
        ->where('company_id', $company_id)->defaultOrder()->get();

        return view('company_employee.hr.company_employees.list',
        ['employees_data'=>$employees_data,
         'company_id' => $company_id,]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function create($company_id)
    {
        $un_added_employees = UnaddedCompanyEmployee::where('company_addition', 1)
        ->where('company_id', $company_id)->get();

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
        $request->validate([
            'email'=> 'required|exists:unadded_company_employees,id',
            'role'=> 'required|exists:company_employee_roles,id'
        ]);

        $unadded_employee= UnaddedCompanyEmployee::find($request->input('email'));
        
        CompanyEmployee::create([
            'email' => $unadded_employee->email,
            'password' => $unadded_employee->password,
            'phone' => $unadded_employee->phone,
            'first_name' => $unadded_employee->first_name,
            'second_name' => $unadded_employee->second_name,
            'third_name' => $unadded_employee->third_name,
            'last_name' => $unadded_employee->last_name,
            'image' => $unadded_employee->image,
            'company_id' => $unadded_employee->company_id,
            'company_employee_role_id' => $request->role
        ]);
        $unadded_employee->delete();
        return redirect()->route('hr_add_employee', ['company_id' => $company_id]);
    }


    /**
     * Remove the specified resource from storage.
     * this mehod will set all assosiated fk.s in children to null(trainings)
     */
    public function destroy($company_id, $employee_id)
    {
        $companyEmployee=  CompanyEmployee::findOrFail($employee_id);
        $companyEmployee->delete();
        return redirect()->route('hr_list_employees', ['company_id' => $company_id]);
    }
}
