<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Company;
use App\Models\Student;

class AssignTrainingController extends Controller
{
     /**
     * @param  int  $id
     * 
     */
    public function index($company_id)
    {
        $company = Company::findOrFail($company_id);
        
        $trainings = $company->trainings()->get();
        
        $engaged_students = [];
        $unengaged_students = [];

        foreach ($trainings as $training) {
            if ($training->name == 'Unengaged Trainees') {
                $unengaged_students = $training->students()
                ->select('id', 'first_name_en', 'last_name_en')
                ->get();
            } else {
                $students = $training->students()
                    ->select('first_name_en', 'last_name_en')
                    ->get();
                
                if ($students->isNotEmpty()) {
                    $engaged_students = $students;
                }
            }
        }
        return view('company_employee.hr.trainees.assign_trainings', [
            'unengaged_students' => $unengaged_students,
            'engaged_students' => $engaged_students,
            'company_id' => $company_id
        ]);
    }

    /**
     * Add a trainee for selected training.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $company_id
     * @param  int  $student_id
     * @return \Illuminate\Http\Response
     */
    public function add(Request $request, $company_id, $student_id)
    {
        Student::find($student_id)
        ->update(['training_id' => $request->input('tarining')]);

        return redirect()->route('hr_assign_trainings', ['company_id' => $company_id]);
    }
}
