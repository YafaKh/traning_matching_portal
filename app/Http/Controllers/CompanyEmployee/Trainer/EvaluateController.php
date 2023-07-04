<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\EvaluateStudent;
use App\Models\CompanyEmployee;
use App\Models\Student;


class EvaluateController extends Controller
{
    public function show($id,$trainee_id){
        $trainer =CompanyEmployee::find($id);
        $trainee=Student::find($trainee_id);//get this student
        $trainingID =$trainee->training_id;//get student training
        $allTrainings=$trainer->trainings()->where('id', $trainingID)->get();
        $evaluation = EvaluateStudent::all();
        foreach ($allTrainings as $training) {

        return view('company_employee.trainer.trainees.evaluation',compact('trainer','trainee','training','evaluation'));
        }
    }
    public function add(Request $request, $id, $trainee_id)
    { 
        // dd($request);
        $request->validate([
            'student_weaknesses' => 'required|string|min:1|max:255',
            'willing_to_hire' => 'required|boolean', 
            'willing_to_hire_reason' => 'required|string|min:1|max:255',
            'comments' => 'required|string|min:1|max:255',
            'attendance'=> 'required|integer',
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
            'avg' =>'required|integer',
        ]);
    dd('ss');
        $evaluate = new EvaluateStudent();
        $evaluate->student_weaknesses = $request->input('student_weaknesses');
        $evaluate->willing_to_hire = $request->input('willing_to_hire');
        $evaluate->willing_to_hire_reason = $request->input('willing_to_hire_reason');
        $evaluate->comments = $request->input('comments');
        $evaluate->attendance = $request->input('attendance');
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
        $evaluate->avg = $request->input('avg');

        $evaluate->save();

        $request->session()->flash('success', 'evaluate added successfully.');

        return redirect()->route('trainer_list_traniees', ['user_id' => $id]);
    }
      
}
