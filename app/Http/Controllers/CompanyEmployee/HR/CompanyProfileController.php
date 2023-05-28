<?php

namespace App\Http\Controllers\CompanyEmployee\HR;
use App\Http\Controllers\Controller;
use App\Models\Company; 

use Illuminate\Http\Request;
use Illuminate\Support\Facades;
use Illuminate\Validation\Rules\File;

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
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        return view('company_employee.hr.edit_company_profile',
        ['company_data' => $company_data,
         'company_id' => $company_id,]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $company_id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $company_id)
    {
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
            'contactable.*' => 'exists:employees,id',
        ]);
        $company = Company:: findOrFail($company_id);
        if(($request->hasFile('image')))
        {
            Facades\File::delete('assets/img/'.$company->image);
            $image=Str::after($this->storeImg($request),'img\\');
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
        $branchData = $request->input('branch', []);
        $company->branches()->delete(); // Delete existing branches

        foreach ($branchData as $branch) {
            $company->branches()->create(['branch_address' => $branch]);
        }

        return redirect()->route('hr_company_profile', ['company_id' => $company_id]);
    }

    /**
     * store image.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    private function storeImg(Request $request)
    {
        $newImgName= $request->title .'.'.$request->image->extension();
        return $request->screenshot->move(public_path('assets\img'),$newImgName);     
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete_branch(string $company_id)
    {
        return redirect()
        ->route('hr_edit_company_profile', ['company_id' => $company_id])
        ->withInput();    }
    
}
