<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\EvaluateStudent;
use App\Models\CompanyEmployee;
use App\Models\Student;


class EvaluateController extends Controller
{
    public function show($user_id, $trainee_id){
        $user =CompanyEmployee::find($user_id);
        $trainee=Student::find($trainee_id);//get this student
        $trainingID =$trainee->training_id;//get student training
        $allTrainings=$user->trainings()->where('id', $trainingID)->get();
        $evaluation = EvaluateStudent::all();
        foreach ($allTrainings as $training) {

        return view('company_employee.trainer.trainees.evaluation',compact('user','trainee','training','evaluation'));
        }
    }
    public function add(Request $request, $user_id, $trainee_id)
    { 
        // dd($request);
        $request->validate([
            'student_weaknesses' => 'required|string|min:1|max:255',
            'willing_to_hire' => 'required|boolean', // do i need evaluation???
            'willing_to_hire_reason' => 'required|string|min:1|max:255',
            'comments' => 'required|string|min:1|max:255',
            'fulfilling_required_tasks' => 'required|integer',
            'teamwork_ability' => 'required|integer',
            'punctuality' =>'required|integer',
            'quality_of_work' =>'required|integer',
            'dependability' =>'required|integer',
            'initiative' =>'required|integer',
            'general_appearance' =>'required|integer',
            'ability_to_judge' =>'required|integer',
            'enthusiasm' =>'required|integer',
            'communicational_skills' =>'required|integer',
            'english_language_proficiency' =>'required|integer',
            //do i need to make validation for these columns ???
            'sum' =>'required|integer',
        ]);
    
        $evaluate = new EvaluateStudent();
        $evaluate->student_weaknesses = $request->input('student_weaknesses');
        $evaluate->willing_to_hire = $request->input('willing_to_hire');
        $evaluate->willing_to_hire_reason = $request->input('willing_to_hire_reason');
        $evaluate->comments = $request->input('comments');
        $evaluate->fulfilling_required_tasks = $request->input('fulfilling_required_tasks');
        $evaluate->teamwork_ability = $request->input('teamwork_ability');
        $evaluate->punctuality = $request->input('punctuality');
        $evaluate->quality_of_work = $request->input('quality_of_work');
        $evaluate->dependability = $request->input('dependability');
        $evaluate->initiative = $request->input('initiative');
        $evaluate->general_appearance = $request->input('general_appearance');
        $evaluate->ability_to_judge = $request->input('ability_to_judge');
        $evaluate->enthusiasm = $request->input('enthusiasm');
        $evaluate->communicational_skills = $request->input('communicational_skills');
        $evaluate->english_language_proficiency = $request->input('english_language_proficiency');
        $evaluate->sum = $request->input('sum');

        $evaluate->save();

        $request->session()->flash('success', 'evaluate added successfully.');

        return redirect()->route('fill_traniee_evaluation.add', ['user_id' => $user_id, 'trainee_id' => $trainee_id]);
    }
      
}
