<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\City; 
use App\Models\UniversityEmployee;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{  
    /**
     * Display a listing of the companies.
     */
    public function index($user_id)
    {
        $user = UniversityEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name', 'university_employee_role_id')->first();

        $companies= Company::select(['id','name'])->get();
        $cities = City::all();
        return view('university_employee.coordinator.companies',
        ['user' => $user,
        'companies'=>$companies,
        'cities' => $cities]);
    }
        
    /**
     * Method show_company_profile
     *
     * @param $user_id $user_id [explicite description]
     * @param $company_id $company_id [explicite description]
     *
     * @return void
     */
    public function show_company_profile($user_id, $company_id)
    {
        $company_data = Company::findOrFail($company_id);
        $user = UniversityEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name', 'university_employee_role_id')->first();

        $contactable_employees = $company_data->employees()->where('contactable', 1)->get();
        return view('university_employee.coordinator.company_profile', [
            'company_data' => $company_data,
            'contactable_employees' => $contactable_employees,
            'user' => $user
        ]);
    }
}
