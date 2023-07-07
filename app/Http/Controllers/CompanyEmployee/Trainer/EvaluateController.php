<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\EvaluateStudent;
use App\Models\CompanyEmployee;
use App\Models\Student;


class EvaluateController extends Controller
{
    public function create($user_id, $trainee_id){
        $user =CompanyEmployee::find($user_id);
        $trainee=Student::find($trainee_id);

        return view('company_employee.trainer.trainees.evaluation',compact('user','trainee'));
        
    }
    public function store(Request $request, $user_id, $trainee_id)
    { //dd( $request->input('attendance'));
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
            'avg' =>'required',
        ]);
    
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
        Student::where('id', $trainee_id)
        ->update(['evaluate_student_id' => $evaluate->id]);
        return redirect()->route('trainer_list_traniees', ['user_id' => $user_id, 'trainee_id' => $trainee_id]);
    }    
    /**
     * Method show
     *
     * @param $user_id $user_id [explicite description]
     * @param $student_id $student_id [explicite description]
     *
     * @return void
     */
    public function show($user_id,$student_id)
    {
        $user = CompanyEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();

        $evaluation_data =$student->evaluate_student;
        return view('company_employee.trainer.trainees.show_evaluation', 
        ['user'=>$user, 
        'student'=> $student,
        'evaluation_data'=>$evaluation_data]);
    }      
}
