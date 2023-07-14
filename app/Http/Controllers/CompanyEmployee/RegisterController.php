<?php

namespace App\Http\Controllers\CompanyEmployee;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\UnaddedCompanyEmployee;
use App\Models\UnaddedCompany;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Hash;

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
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:10000000',
            'phone' => 'required',
            'email'=> 'required|email|unique:company_employees,email|max:255',
            'password' => 'required|min:8|confirmed:confirm_password',
        ]);     
        $validatedData['password'] = Hash::make($validatedData['password']);
        $employee = UnaddedCompanyEmployee::create($validatedData);   
        if(($request->hasFile('image')))
        {
            $image=Str::after($this->storeEmpImg($request, $employee->id ),'img\\');
            $employee->update(['image' => $image]);
        }        

        if ($request->has('company_id')) {
            $request->validate(['company_id'=>'required|exists:companies,id']);
            $employee->company_id=$request->input('company_id');   
            $employee->save();
        } else {
            $request->validate([
                'company_name' => 'required|between:2,45',
                'company_industry' => 'required|max:45',
                'company_website' => 'nullable|url',
                'company_email' => 'required|email',
                'company_phone' => 'required',
                'company_linkedin' => 'nullable|url',
                'company_image' => 'nullable|image|mimes:jpeg,png,jpg|max:10000000',
            ]);
            $new_company = UnaddedCompany::create([
                'name' => $request->input('company_name'),
                'industry' => $request->input('company_industry'),
                'website' => $request->input('company_website'),
                'email' => $request->input('company_email'),
                'phone' => $request->input('company_phone'),
                'linkedin' => $request->input('company_linkedin'),
            ]); 
            if(($request->hasFile('company_image')))
            {
                $company_image=Str::after($this->storeCompImg($request, $new_company->id ),'img\\');
                $new_company->update(['image' => $company_image]);
            }        
            $employee->company_addition=0;  
            $employee->company_id= $new_company->id;   
            $employee->save();
        }
        return redirect()->route('user_type');
   }
    /**
     * store image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function storeEmpImg(Request $request, $employee_id)
    {
        $newImgName= 'comp_emp_'.$employee_id .'.'.$request->image->extension();
        return $request->image->move(public_path('assets\img'),$newImgName);     
    }
    private function storeCompImg(Request $request, $company_id)
    {
        $newImgName= 'comp_'.$company_id .'.'.$request->image->extension();
        return $request->image->move(public_path('assets\img'),$newImgName);     
    }

}
