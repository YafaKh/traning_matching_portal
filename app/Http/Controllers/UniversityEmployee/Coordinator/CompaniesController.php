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
        ->select('id', 'first_name', 'last_name')->first();

        $companies= Company::select(['id','name'])->get();
        $cities = City::all();
        return view('university_employee.coordinator.companies',
        ['user' => $user,
        'companies'=>$companies,
        'cities' => $cities]);
    }
}
