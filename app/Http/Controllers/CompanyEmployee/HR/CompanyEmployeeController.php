<?php

namespace App\Http\Controllers\CompanyEmployee\HR;
use Illuminate\Http\Request;



class CompanyEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //id name role branch depart email phone trainees
        $universityEmployeesData= UniversityEmployee::all();
        return view('university_employee.coordinator.university_employees.list',['university_employees'=>$universityEmployeesData]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('university_employee.coordinator.university_employees.add');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate();
        $universityEmployee= UniversityEmployee::create();
    }

    /**
     * Update the specified resource in storage.
     * In practice, the coordinator is only allowed to update the employee's role
     */
    public function update(Request $request, string $id)
    {
        $request->validate();
        $universityEmployee=UniversityEmployee::where('id',$id)->first();
        $universityEmployee->update([$request->input('company_role_id')]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $universityEmployee=  UniversityEmployee::where('id',$id)->first();
        $universityEmployee->delete();
        index();
    }
}
