<?php

namespace App\Http\Controllers\CompanyEmployee\Trainer;

use App\Models\CompanyEmployee;
use App\Models\Student;

use Illuminate\Routing\Controller;
use Illuminate\Http\Request;

class TrainerController extends Controller
{
    public function show($user_id){
        // return the emoloyee if he have company_employee_role_id = 2 or 3
        $user=CompanyEmployee::whereIn('company_employee_role_id', [2, 3])->find($user_id);
        if ($user==null) {
            return "Trainer not found ";
        }

        $allTrainees=$user->students()->paginate(10);
        $allTrainings=$user->trainings;
        
        return view('company_employee.trainer.trainees.list',compact('user','allTrainees','allTrainings'));
    }
    public function search($user_id){
        $search_text = $_GET['search']; // name of the search input

        $user = CompanyEmployee::find($user_id); 
        
        $students = $user->students()->where(function ($query) use ($search_text) {
            $query->where('first_name_en', 'LIKE', '%' . $search_text . '%')
                ->orWhere('second_name_en', 'LIKE', '%' . $search_text . '%')
                ->orWhere('third_name_en', 'LIKE', '%' . $search_text . '%')
                ->orWhere('last_name_en', 'LIKE', '%' . $search_text . '%')
                ->orWhere('student_num', 'LIKE', '%' . $search_text . '%');
        })->paginate(15);
        $allTrainees=$user->students()->paginate(10);
        $allTrainings=$user->trainings;
        return view('company_employee.trainer.trainees.searchForTrainee', compact('students','user','allTrainees','allTrainings'));

        
    }
    /**
     * Method show_student_profile
     *
     * @param $user_id $user_id [explicite description]
     * @param $student_id $student_id [explicite description]
     *
     * @return void
     */
    public function show_student_profile($user_id, $student_id)
    {
        $user = CompanyEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();;
        return view('company_employee.trainer.student_profile',compact('user','student'));  
    }
}
