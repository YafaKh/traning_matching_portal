<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;

use App\Models\UniversityEmployee;


class UniversityEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //to delete
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //to delete
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
