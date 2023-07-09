<?php

namespace App\Http\Controllers\Student;
use App\Models\Student;
use App\Models\Skill;
use App\Models\EvaluateCompany;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EvaluateCompanyController extends Controller
{
     public function show($user_id){
            $user =Student::find($user_id);
            $companyName = $user->training->branch->company->name ?? "__";
            $allSkills =Skill::all();
            $company_data= $user->training->branch->company ?? 0;

            // $company= $student->training->branch->company;
       
            return view('student.company_evaluation',compact('user','allSkills','companyName','company_data'));
    }
    public function companyprofile($user_id,$company_id){
        $user =Student::find($user_id);
        $company_data= $user->training->branch->company ?? 0;
        $contactable_employees = $company_data->employees()->where('contactable', 1)->get();

        return view('student.company_profile',compact('user','company_data','contactable_employees'));

    }
    public function add(Request $request,$user_id){
        //  dd('inside add');
        // dd($user_id);
        // dd($request);
        $request->validate([
        'skills_you_trained' =>'required|string|max:255',
        'training_palce_evaluation'=>'required|integer|min:0|max:100',
        'pros'=>'required|max:255|string',
        'cons'=>'required|max:255|string',
        'new_skills_gained'=>'required|max:255|string',
        'skills_wish_they_included'=> 'required|max:255|string',
        'skills_wish_were_given_better'=> 'required|max:255|string',
        'recommend_sending_students'=>'required|boolean',
        'recommended_evaluate_sys'=>'required|max:255|string',
        'recommended_evaluate_sys_explanation'=>'required|max:255|string',
        'internship_time_before_senior_year'=> 'required|max:255|string',
        'more_than_one_internship'=> 'required|max:255|string',
        'finding_training_difficulties'=> 'required|max:255|string',
        'recommendations'=> 'required|max:255|string',
        'notes_about_website'=>'required|max:255|string',
// 15col

                ]);
                
                
    EvaluateCompany::create([
        'skills_you_trained'=> $request->skills_you_trained,
        'training_palce_evaluation'=> $request->training_palce_evaluation,
        'pros'=> $request->pros,
        'cons'=> $request->cons,
        'new_skills_gained'=> $request->new_skills_gained ,
        'skills_wish_they_included'=> $request-> skills_wish_they_included,
        'skills_wish_were_given_better'=> $request-> skills_wish_were_given_better,
        'recommend_sending_students'=> $request-> recommend_sending_students === 'on',
        'recommended_evaluate_sys'=> $request-> recommended_evaluate_sys,
        'skills_you_trained'=> $request-> skills_you_trained,
        'recommended_evaluate_sys_explanation'=> $request-> recommended_evaluate_sys_explanation,
        'internship_time_before_senior_year'=> $request-> internship_time_before_senior_year,
        'more_than_one_internship'=> $request-> more_than_one_internship,
        'finding_training_difficulties'=> $request-> finding_training_difficulties,
        'recommendations'=> $request-> recommendations,
        'notes_about_website'=> $request-> notes_about_website,

        ]);
       
         return redirect()->route('student_evaluate_company', ['user_id' => $user_id]);

    
        }

        public function show_company_evaluation($user_id)
    {
        $user = Student::where('id', $user_id)->first();
        $student = $user;

        $evaluation_data =$student->evaluate_company;

        return view('student.show_company_evaluation', compact('user', 'student','evalusation_data'));

    }
}
