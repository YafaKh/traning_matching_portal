<?php

namespace App\Http\Controllers\Coordinator;

use Illuminate\Http\Request;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select from company id,  name, email, phone, branchs
        $companiesData= Company::all();
        return view('university_employee.coordinator.companies',['company'=>$companiesData]);
    }


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //profile
    }

}
