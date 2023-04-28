<?php

namespace App\Http\Controllers\Coordinator;
use Illuminate\Http\Request;

use App\Models\UniversityEmployee;


class UniversityEmployeesController extends Controller
{
    /**
     * Display a listing of the employees.
     */
    public function index()
    {
        $universityEmployeesData= UniversityEmployee::all();
        return view('university_employee.coordinator.university_employees.list',['university_employees'=>$universityEmployeesData]);
    }
    
    /**
     * Update the specified employee's role
     */
    public function update_role(Request $request, string $id)
    {
        $request->validate();
        $universityEmployee=UniversityEmployee::where('id',$id)->first();
        $universityEmployee->update([$request->input('company_role_id')]);
    }

        /**
     * Show the form for adding a new employee.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created employee in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Remove the specified employee from storage.
     */
    public function destroy(string $id)
    {
        $universityEmployee=  UniversityEmployee::where('id',$id)->first();
        $universityEmployee->delete();
        index();
    }
}
