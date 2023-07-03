<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use App\Models\CompanyEmployee;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function show($id){
        // return the emoloyee if he have company_employee_role_id = 2 or 3
        $trainer=CompanyEmployee::whereIn('company_employee_role_id', [2, 3])->find($id);
        if ($trainer==null) {
            return "Trainer not found ";
        }

        $allTrainees=$trainer->students()->paginate(10);
        $allTrainings=$trainer->trainings;
        
        return view('company_employee.trainer.trainees.list',compact('trainer','allTrainees','allTrainings'));
    }
}
