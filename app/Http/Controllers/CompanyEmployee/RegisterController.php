<?php

namespace App\Http\Controllers\CompanyEmployee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnaddedCompanyEmployee;
use App\Models\Company;

class RegisterController extends Controller
{
    /**
     * Show the Company Employee registeration form.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies= Company::select('id', 'name')->get();
        return view('company_employee.register', ['companies' => $companies]);
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
            'password' => 'required|min:8|confirmed:confirm_password',
        ]);
        $employee = UnaddedCompanyEmployee::create($validatedData);           
        return redirect()->route('company_employee_register')
        ->with('success', 'Employee created successfully.');
}

}
