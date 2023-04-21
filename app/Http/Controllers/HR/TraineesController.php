<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TraineesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        /*select id name beanch depart trainer progress evaluation approved or not
        if app to first table else sev*/
    }

    /**
     * Display a listing of university students 
     */
    public function list_university_students()
    {
        //select id name specilz gpa load aval
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //store to training table
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //profile
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }
    public function assgin_trainers(Request $request, string $id)
    {
        $student=Student::where('id',$id)->first();
        //update on training table
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
