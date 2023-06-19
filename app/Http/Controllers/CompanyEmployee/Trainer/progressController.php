<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\CompanyEmployee;
use App\Models\Student;
use App\Models\Training;

class progressController extends Controller
{
    public function show($id,$trainee_id){
        $trainer=CompanyEmployee::find($id);
        $trainee=Student::find($trainee_id);//get this student
        $trainingID =$trainee->training_id;//ex : 55 -get student training
     
        $trainers=CompanyEmployee::all();
        
        $allTrainings=$trainer->trainings()->where('id', $trainingID)->get();

        foreach ($allTrainings as $training) {
        
    
        return view('company_employee.trainer.trainees.progress',compact('trainer','trainers','trainee','training'));
        }
    }

    public function add($id,$trainee_id, Request $request){
        $request->validate([
            'week' => 'required|string',
            'end_date' => 'required|date',
            'passed_hours' => 'required|integer',
            'absences_days' => 'required|integer',
            'note' => 'required|max:155|string',
        ]);
    }
}
