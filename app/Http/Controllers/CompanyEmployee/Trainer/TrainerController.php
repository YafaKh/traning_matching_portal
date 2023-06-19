<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use App\Models\CompanyEmployee;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function show($id){
        $trainer=CompanyEmployee::find($id);
        $trainers=CompanyEmployee::all();
        // dd($trainees = CompanyEmployee::with('students')->find($id));
        $allTrainees=$trainer->students;//trainer_id: 43 have three trainees
        $allTrainings=$trainer->trainings;
        return view('company_employee.trainer.trainees.list',compact('trainer','trainers','allTrainees','allTrainings'));
    }
}
