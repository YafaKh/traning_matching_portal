<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

class CompaniesController extends Controller
{
    //fillter 
    
    /**
     * Display a listing of the companies.
     */
    public function index()
    {
        //select from company id,  name, email, phone, branchs
        $companiesData= Company::select(['id','name'])
        ->get();
        return view('university_employee.coordinator.companies',['company'=>$companiesData]);
    }
}
