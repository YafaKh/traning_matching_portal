<?php

namespace App\Http\Controllers\CompanyEmployee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\CompanyEmployee;
use App\Models\CompanyRole;


class RegisterController extends Controller
{
    /**
     * Show the Company Employee registeration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('company_employee.register');
    }

    /**
     * Store a newly created Company Employee in storage.
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
            'phone' => 'required|numeric',
            'email'=> 'required|email|unique:company_employees,email|max:255',
            'company_id'=>'required|exists:companies,id',
            'employees_roles'=> 'required|exists:company_employees_roles',
            'password' => 'required|min:8|confirmed:confirm_password',
        ]);
        try {
            // Create the employee
            $employee = CompanyEmployee::create($validatedData);
            // Sync the employee's role
            $employee->roles()->sync($request->employees_roles);
        } catch (\Exception $e) {
            // Handle any exceptions that occur
            return redirect()->back()->with('error',
             'An error occurred while creating the employee: ' . $e->getMessage());
        }
    
        // Redirect to the index page with a success message
        return redirect()->route('company_employee.register')
        ->with('success', 'Employee created successfully.');
}

}
