<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Company;
use App\Models\Admin;

class CompaniesController extends Controller
{
    public function index(){
        $companies =Company::all();

        return view('admin.companies', ['companies'=>$companies]);
    }
     /**
     * Method show_company_profile
     *
     * @param $user_id $user_id [explicite description]
     * @param $company_id $company_id [explicite description]
     *
     * @return void
     */
    public function show_company_profile($company_id)
    {
        $company_data = Company::findOrFail($company_id);
        $user = Admin::select('first_name', 'last_name')->first();

        $contactable_employees = $company_data->employees()->where('contactable', 1)->get();
        return view('admin.company_profile', [
            'company_data' => $company_data,
            'contactable_employees' => $contactable_employees,
            'user' => $user
        ]);
    }
}
