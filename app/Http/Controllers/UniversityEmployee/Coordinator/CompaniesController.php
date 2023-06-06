<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\City; 

use Illuminate\Http\Request;

class CompaniesController extends Controller
{  
    /**
     * Display a listing of the companies.
     */
    public function index()
    {
        $companies= Company::select(['id','name'])->get();
        $cities = City::all();
        return view('university_employee.coordinator.companies',
        ['companies'=>$companies,
        'cities' => $cities]);
    }
}
