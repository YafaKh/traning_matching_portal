<?php

namespace App\Http\Controllers\CompanyEmployee\HR;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\CompanyEmployee;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {
        //to edit: current semester
        $company = Company:: findOrFail($company_id);
        $trainings_data= $company->trainings;
        return view('company_employee.hr.trainings.list',
        ['trainings_data'=>$trainings_data,
         'company_id' => $company_id]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($company_id)
    {
        $branches = CompanyBranch::where('company_id', $company_id)->get();

        $trainers = CompanyEmployee::where('company_id', $company_id)
        ->where(function ($query) {
        $query->where('company_employee_role_id', 2)
        ->orWhere('company_employee_role_id', 3);})->get();
      
        return view('company_employee.hr.trainings.add',
        ['company_id' => $company_id, 'branches' => $branches, 'trainers' => $trainers]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $company_id)
    {// to edit: create name auto
        Training::create([
            'semester' => $request->semester,
            'company_branch_id' => $request->branch,
            'company_employee_id' => $request->trainer,
            'name' => $request->name,
            'training_feild' => $request->training_feild,
            'details' => $request->details
        ]);
        return redirect()->route('hr_list_trainings', ['company_id' => $company_id]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //to edit
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //to edit
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //to edit
    }
}
