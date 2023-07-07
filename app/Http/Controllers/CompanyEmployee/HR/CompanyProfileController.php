<?php

namespace App\Http\Controllers\CompanyEmployee\HR;
use App\Http\Controllers\Controller;
use App\Models\Company; 
use App\Models\City; 
use App\Models\CompanyBranch; 
use App\Models\CompanyEmployee;

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
    public function index($user_id)
    {
        $user = CompanyEmployee::where('id', $user_id)->first();
        $company_data = $user->company;

        $contactable_employees = $company_data->employees()->where('contactable', 1)->get();
        return view('company_employee.hr.company_profile',
        ['user' => $user,
        'company_data' => $company_data,
        'contactable_employees' => $contactable_employees]);
    }


    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($user_id)
    {
        $user = CompanyEmployee::where('id', $user_id)->first();
        $company_data = $user->company;

        $cities = City::all();
        return view('company_employee.hr.edit_company_profile',
        ['user' => $user,
        'company_data' => $company_data,
        'cities' => $cities]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,  $user_id)
    {  
        $user = CompanyEmployee::where('id', $user_id)
       ->select('id', 'first_name', 'last_name', 'company_id')->first();

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
        $company = $user->company;
        if(($request->hasFile('image')))
        {
            Facades\File::delete('assets/img/'.$company->image);
            $image=Str::after($this->storeImg($request, $company->id ),'img\\');
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

        return redirect()->route('hr_company_profile', ['user_id' => $user_id]);
    }

    /**
     * store image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function storeImg(Request $request, $company_id, $user_id)
    {
        $newImgName= $company_id .'_company_profile.'.$request->image->extension();
        return $request->image->move(public_path('assets\img'),$newImgName);     
    }
}
