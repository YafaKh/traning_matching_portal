<?php

namespace App\Http\Controllersrs\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;

class ListController extends Controller
{
    //filtering

     /**
     * list all company trainees with some info
     */
    public function index()
    {
        //select from student id, name , branch, Department, trainer, approval, progress, visit_form, evaluation, company_evaluation, 
       /*$studentsData= */
       $trainees=;
       return view('company_employee.hr.trainees.list');//,['students'=>$studentsData]);
    }
}
