<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
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
       $company = Company::findOrFail($id);

        $students = $company->trainings()->with('students')->get()
            ->pluck('students')
            ->flatten();
       return view('company_employee.hr.trainees.list',['students'=>$students]);
    }
}
