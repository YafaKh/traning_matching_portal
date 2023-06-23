<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Models\Company;
use App\Models\CompanyEmployee;


class ListController extends Controller
{
    //filtering

     /**
     * @param  int  $id
     * list all company trainees with some info
     */
    public function index($company_id, $user_id)
    {
       $company = Company:: findOrFail($company_id);
       $user = CompanyEmployee::where('id', $user_id)
       ->select('id', 'first_name', 'last_name')->first();

       $trainings = $company->trainings->skip(1);

        $not_aaproved_students= $company->not_approved_students;
 
        //filters data
        $unengaged_trainees= ($company->trainings[0])->students;
        $branches= $company->branches;
        $trainers= $company->employees->whereIn('company_employee_role_id', [2, 3]);
        return view('company_employee.hr.trainees.list',
         ['company_id' => $company_id,
         'user' => $user,
         'trainings' => $trainings,
          //'students_data' => $students_data,
          'not_aaproved_students' => $not_aaproved_students,
          'unengaged_trainees' => $unengaged_trainees,
          'branches' => $branches,
          'trainers' => $trainers,]);
    }
}
