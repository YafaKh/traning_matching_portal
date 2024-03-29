<?php

namespace App\Http\Controllers\CompanyEmployee\HR;
use App\Http\Controllers\Controller;

use Illuminate\Http\Request;
use App\Models\Training;
use App\Models\CompanyBranch;
use App\Models\CompanyEmployee;
use App\Models\TrainingField;

class TrainingController extends Controller
{
    /**
     * Display a listing of the resource.
     * 
     * @return \Illuminate\Http\Response
     */
    public function index($user_id, Request $request)
    {
        $user = CompanyEmployee::where('id', $user_id)->first();
        $company = $user->company;
        
        $trainings = $company->trainings->where('active', 1)
        ->where('year', '>=', date('Y'))->skip(1);
        $branches = $company->branches;
        $training_fields = TrainingField::all();
        $trainers = CompanyEmployee::where('company_id', $company->id)
            ->whereIn('company_employee_role_id', [2, 3])->get();

        if ($request->input('filter') === 'all') {
            $trainings = $company->trainings->where('active', 1)->skip(1);
        }

        return view('company_employee.hr.trainings.list', [
            'user' => $user,
            'trainings' => $trainings,
            'branches' => $branches,
            'training_fields' => $training_fields,
            'trainers' => $trainers,
            'request' => $request,
        ]);
    }
    public function search($user_id)
    {
        $search_text = $_GET['search']; // name of the search input
    
        $user = CompanyEmployee::find($user_id);
        $company = $user->company;
    
        // $trainings = $company->trainings->skip(1);
        //  dd($user->students());
       $trainings = $company->trainings()->where(function ($query) use ($search_text) {
            $query->where('name', 'LIKE', '%' . $search_text . '%');
        })->paginate(15);

        $not_aaproved_students= $company->not_approved_students;
        $unengaged_trainees= ($company->trainings[0])->students;
        $branches= $company->branches;
        $trainers= $company->employees->whereIn('company_employee_role_id', [2, 3]);
        
    
        return view('company_employee.hr.trainees.searchForTrainee', compact('user','company', 'trainings', 'not_aaproved_students', 'unengaged_trainees', 'branches', 'trainers'));
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
        $training_fields = TrainingField::all();

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
         'training_fields' => $training_fields]);
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
            'training_field_id' => $request->training_field,
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
