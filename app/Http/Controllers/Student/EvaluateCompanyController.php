<?php

namespace App\Http\Controllers\Student;
use App\Models\Student;
// use App\Models\CompanyBranch;
use App\Models\Student_skill;
use App\Models\Skill;
use App\Models\EvaluateCompany;
// use App\Models\Company_branch;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class EvaluateCompanyController extends Controller
{
     public function show($user_id){
            $student =Student::find($user_id);
            $companyName = $student->training->branch->company->name ?? "__";
            $allSkills =Skill::all();
            // $company= $student->training->branch->company;
       
            return view('student.evaluate_company',compact('student','allSkills','companyName','company'));
    }
    public function companyprofile($user_id,$company_id){
        $student =Student::find($user_id);
        $company_data= $student->training->branch->company ?? 0;
        return view('student.company_profile',compact('student','company_data'));

    }
    public function add(Request $request){
         dd('inside add');
        dd($request->all());
        // dd($request);
        $request->validate([
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
// 14col

                ]);
                
    Skill::create([
        'name'=>$request->name,
        'student_id' =>$request->id,
        'skill_id' => $request->skill_id,
    ]);
    EvaluateCompany::create([
        'training_palce_evaluation'=> $request->training_palce_evaluation,
        'pros'=> $request->pros,
        'cons'=> $request->cons,
        'new_skills_gained'=> $request->new_skills_gained ,
        'skills_wish_they_included'=> $request-> skills_wish_they_included,
        'skills_wish_were_given_better'=> $request-> skills_wish_were_given_better,
        'recommend_sending_students'=> $request-> recommend_sending_students === 'on',
        'recommended_evaluate_sys'=> $request-> recommended_evaluate_sys,
        // 'evaluate_companycol'=> $request-> evaluate_companycol,
        'recommended_evaluate_sys_explanation'=> $request-> recommended_evaluate_sys_explanation,
        'internship_time_before_senior_year'=> $request-> internship_time_before_senior_year,
        'more_than_one_internship'=> $request-> more_than_one_internship,
        'finding_training_difficulties'=> $request-> finding_training_difficulties,
        'recommendations'=> $request-> recommendations,
        'notes_about_website'=> $request-> notes_about_website,

        ]);
       
         return redirect(route('student.evaluate_company'));
  
    
        }

        
}
