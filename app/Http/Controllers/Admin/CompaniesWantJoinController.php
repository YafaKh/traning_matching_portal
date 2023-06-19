<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\UnaddedCompany;
use App\Models\UnaddedCompanyEmployee;
use App\Models\CompanyEmployee;
use App\Models\Company;

class CompaniesWantJoinController extends Controller
{
    public function index(){
        $unadded_companies =UnaddedCompany::all();

        return view('admin.companies_want_Join', ['unadded_companies'=> $unadded_companies]);
    }
    public function accept($company_id)
    {

        $unadded_company =  UnaddedCompany::findOrFail($company_id);
        $unadded_company_employee =  UnaddedCompanyEmployee::where('company_addition', 0)
        ->where('company_id', $unadded_company->id)->first();
        //dd($unadded_company_employee);

        $company= Company::create([
            'name' => $unadded_company->name,
            'industry' => $unadded_company->industry,
            'website' => $unadded_company->website,
            'linkedin' => $unadded_company->linkedin,
        ]);
        $company->emails()->create(['email_address' => $unadded_company->email]);
        $company->phones()->create(['phone_no' => $unadded_company->phone]);

        $unadded_company->delete();

        $company_employee= CompanyEmployee::create([
            'email' => $unadded_company_employee->email,
            'password' => $unadded_company_employee->password,
            'phone' => $unadded_company_employee->phone,
            'first_name' => $unadded_company_employee->first_name,
            'second_name' => $unadded_company_employee->second_name,
            'third_name' => $unadded_company_employee->third_name,
            'last_name' => $unadded_company_employee->last_name,
            'image' => $unadded_company_employee->image,
            'company_id' => $company->id,
            'company_employee_role_id' => 1
        ]);
        $unadded_company_employee->delete();

        return redirect()->route('admin_compnies_want_to_join');
    }

    public function reject($company_id)
    {
        $company =  UnaddedCompany::findOrFail($company_id);
        $unadded_company_employee =  UnaddedCompanyEmployee::where('company_addition', 0)
        ->where('company_id', $company->id)->first();

        $company->delete();        
        $unadded_company_employee->delete();
        return redirect()->route('admin_compnies_want_to_join');
    }
}
