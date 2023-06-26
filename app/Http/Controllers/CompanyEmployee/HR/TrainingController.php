<?php

namespace App\Http\Controllers\CompanyEmployee\HR;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\CompanyEmployee;
use App\Models\TrainingFeild;
use App\Models\Student;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($user_id)
    {
        //to edit: current semester
        $user = CompanyEmployee::where('id', $user_id)->first();
        $company = $user->company;
        
        $trainings_data= $company->trainings->where('active', 1)->skip(1);
        $branches= $company->branches;
        $training_feilds = TrainingFeild::all();
        $trainers = CompanyEmployee::where('company_id', $company->id)
        ->where('active', 1)
        ->where(function ($query) {
        $query->where('company_employee_role_id', 2)
        ->orWhere('company_employee_role_id', 3);})->get();

        return view('company_employee.hr.trainings.list',
        [
         'user' => $user,
         'trainings_data'=>$trainings_data,
         'branches' => $branches,
         'training_feilds' => $training_feilds,
         'trainers' => $trainers,]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($user_id)
    {
        $user = CompanyEmployee::where('id', $user_id)->first();
        $company = $user->company;

        $branches = CompanyBranch::where('company_id', $company->id)->get();
        $training_feilds = TrainingFeild::all();

        $trainers = CompanyEmployee::where('company_id', $company->id)
        ->where('active', 1)
        ->where(function ($query) {
        $query->where('company_employee_role_id', 2)
        ->orWhere('company_employee_role_id', 3);})->get();
      
        return view('company_employee.hr.trainings.add',
        [
         'user' => $user,
         'branches' => $branches,
         'trainers' => $trainers,
         'training_feilds' => $training_feilds]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request, $user_id)
    {
        $request->validate([
            'name' => [
                'required',
                'string',
                'max:45',
                //the name is unique at company level
                function ($attribute, $value, $fail) use ($user_id){
                    $user = CompanyEmployee::where('id', $user_id)->first();
                    $company = $user->company;
                    if ($existingTraining) {
                        $fail('The training name already exists for your company.');
                    }
                },
            ],
        ]);
        //to handle case when the selected option is the last one (Fall-date('Y')+1)
        $semester = $request->semester;
        $year = date('Y');

        if ($semester == 5) {
            $semester = 1;
            $year++;
        }
        Training::create([
            'semester' => $semester,
            'year' => $year,
            'company_branch_id' => $request->branch,
            'company_employee_id' => $request->trainer,
            'name' => $request->name,
            'training_feild_id' => $request->training_feild,
            'details' => $request->details
        ]);
        return redirect()->route('hr_list_trainings', ['user_id' => $user_id]);
    }

        
    /**
     * Method destroy
     *
     * @param $training_id $training_id [explicite description]
     *
     * @return void
     * 
     *Remove the specified resource from storage.
     * this mehod will set all assosiated fk.s in children to null(trainees)
     */
    public function destroy( $user_id, $training_id)
    {
        $training=  Training::findOrFail($training_id);

        $training->active = 0; // Set the "active" column to 0
        $training->save();
        return redirect()->route('hr_list_trainings', ['user_id' => $user_id]);
    }
}
