<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Models\Company;


class ListController extends Controller
{
    //filtering

     /**
     * @param  int  $id
     * list all company trainees with some info
     */
    public function index($company_id)
    {
       $company = Company:: findOrFail($company_id);

       $not_aaproved_students= $company->not_approved_students;
       $trainings = $company->trainings()->get();
       $students_data = [];
        foreach ($trainings as $training) {
            $students = $training->students()
                ->select('first_name_en', 'last_name_en')
                ->get();
             //to edit, do it as assign training
            foreach ($students as $student) {
                $students_data[] = [
                    'first_name_en' => $student->first_name_en,
                    'last_name_en' => $student->last_name_en,
                    'training_name' => $training->name,
                    'training_branch' => $training->branch->address,
                    'trainer_first_name' => $training->employee->first_name ?? '',
                    'trainer_last_name' => $training->employee->last_name ?? '',
                ];
            }
        }

        //filters data
        
        return view('company_employee.hr.trainees.list',
         ['trainings_data' => $trainings,
          'students_data' => $students_data,
          'not_aaproved_students' => $not_aaproved_students,
          'company_id' => $company_id]);
    }
}
