<?php

namespace App\Http\Controllers\CompanyEmployee\HR;
use App\Http\Controllers\Controller;
use App\Models\Company; 
use App\Models\City; 
use App\Models\CompanyBranch; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;

class CompanyProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {
        $company_data = Company:: findOrFail($company_id);
        $contactable_employees = $company_data->employees()->where('contactable', 1)->get();
        return view('company_employee.hr.company_profile',
        ['company_id' => $company_id,
        'company_data' => $company_data,
        'contactable_employees' => $contactable_employees]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($company_id)
    {
        $company_data = Company:: findOrFail($company_id);
        $cities = City::all();
        return view('company_employee.hr.edit_company_profile',
        ['company_data' => $company_data,
         'company_id' => $company_id,
         'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $company_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company_id)
    {       // $company = Company:: findOrFail($company_id);
        //dd($company->employees);
        
         $request->validate([
            'name' => 'required|max:45',
            'industry' => 'required|max:45',
            'description' => 'nullable|max:200',
            'website' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'email.*' => 'email|max:255',
            'phone.*' => 'string|max:20',
            'branch.*' => 'string|max:45',
            'contactable.*' => 'exists:company_employees,id',
        ]);
        $company = Company:: findOrFail($company_id);
        if(($request->hasFile('image')))
        {
            Facades\File::delete('assets/img/'.$company->image);
            $image=Str::after($this->storeImg($request, $company_id ),'img\\');
            $company->update(['image' => $image]);
        }

        $company->update([
            'name' =>$request->input('name'), 
            'industry' =>$request->input('industry'), 
            'description' =>$request->input('description'), 
            'website' =>$request->input('website'), 
            'linkedin' =>$request->input('linkedin'),
        ]);

        // Update the emails
        $emailData = $request->input('email', []);
        $company->emails()->delete(); // Delete existing emails

        foreach ($emailData as $email) {
            $company->emails()->create(['email_address' => $email]);
        }
        // Update the phones
        $phoneData = $request->input('phone', []);
        $company->phones()->delete(); // Delete existing phones

        foreach ($phoneData as $phone) {
            $company->phones()->create(['phone_no' => $phone]);
        }

        // Update the branches
        $old_cities = $request->input('old_city', []);
        $old_branches = $request->input('old_branch', []);

        foreach ($company->branches as $index => $branch) {
            $branch->update([
                'address' => $old_branches[$index],
                'city_id' => $old_cities[$index]
            ]);
        }

        $new_branches = $request->input('branch', []);
        foreach ($new_branches as $new_branch_address) {
            // Extract city ID and address
            $address_parts = explode('-', $new_branch_address);
            $city_id = trim($address_parts[0], '(');
            $address = trim($address_parts[1]);

            // Add new branch
            $company->branches()->create([
                'address' => $address,
                'city_id' => $city_id[0],
            ]);
        }

        //contactable
        $employeeIds = $request->input('contactable', []);
       
        foreach ($company->employees as $employee) {
            $employee->update([
            'contactable' => in_array($employee->id, $employeeIds)]);
         }

        return redirect()->route('hr_company_profile', ['company_id' => $company_id]);
    }

    /**
     * store image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function storeImg(Request $request, $company_id)
    {
        $newImgName= $company_id .'_company_profile.'.$request->image->extension();
        return $request->image->move(public_path('assets\img'),$newImgName);     
    }
}
