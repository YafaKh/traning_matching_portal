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
    public function index($id)
    {
        //select from student id, name , branch, Department, trainer, approval, progress, visit_form, evaluation, company_evaluation, 
       /*$studentsData= */
       $company = Company:: findOrFail($id);
       $trainings = $company->trainings()->get();
       $students_data = [];

        foreach ($trainings as $training) {
            $students = $training->students()
                ->select('first_name_en', 'last_name_en')
                ->get();
             
            foreach ($students as $student) {
                $students_data[] = [
                    'first_name_en' => $student->first_name_en,
                    'last_name_en' => $student->last_name_en,
                    'training_name' => $training->name,
                    'training_branch' => $training->branch->address,
                    'trainer_first_name' => $training->employee->first_name,
                    'trainer_last_name' => $training->employee->last_name,
                ];
            }
        }
        return view('company_employee.hr.trainees.list', ['students_data' => $students_data]);

       /*foreach ($trainings as $training) {
            $students=$training->students()
            ->select('first_name_en', 'last_name_en')
            ->get();
            foreach($students as $student)
            {
                $student->setAttribute('training_name', $training->name);
            }           
       }
       dd($students);
       $students = Student::select('first_english_name','last_english_name')
       ->whereIn(
        'training_id',
        $trainings);
        $students = $company->trainings()
        ->with('students')
        ->get()
        ->pluck('students')
        ->flatten();*/
    }
}
