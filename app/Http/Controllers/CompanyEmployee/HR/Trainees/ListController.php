<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Models\Company;
use App\Models\Student;
use App\Models\Training;


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
       
       $trainings = $company->trainings()
       ->select('name')
       ->get();
       
       $students = collect();
       foreach ($trainings as $training) {
        dd($training->students()
        ->select('first_name_en', 'last_name_en')->get()
         ) ;
           $students = $students
           ->concat($training->students()
           ->select('first_name_en', 'last_name_en')
            );
       }
       /*$students = Student::select('first_english_name','last_english_name')
       ->whereIn(
        'training_id',
        $trainings);
        $students = $company->trainings()
        ->with('students')
        ->get()
        ->pluck('students')
        ->flatten();*/
       return view('company_employee.hr.trainees.list',['students'=>$students]);
    }
}
