<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Models\Company;
use App\Models\Student;

class AssignTrainingController extends Controller
{  
    /**
     * Method index
     *
     * @param $company_id $company_id [explicite description]
     *
     * @return void
     */
    public function index($company_id)
    {
        $company = Company::findOrFail($company_id);

        $trainings = $company->trainings()->get();
        
        $unengaged_students = collect();
        $engaged_students = collect();
        
        foreach ($trainings as $training) {
            $students = $training->students()
                ->select('id', 'first_name_en', 'last_name_en')
                ->get();
        
            if ($training->name == 'Unengaged Trainees') {
                $unengaged_students = $students;
            } else {
                $students = $students->map(function ($student) use ($training) {
                    $student['training_name'] = $training->name;
                    return $student;
                });
        
                $engaged_students = $engaged_students->concat($students);
            }
        }
    
        
        return view('company_employee.hr.trainees.assign_trainings', [
            'trainings' => $trainings->reject(function ($training) {
                return $training->name == 'Unengaged Trainees';}),
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
        $request->validate([
            'training' => 'required|exists:trainings,id',
        ]);
        //dd($request->input('training'));
        Student::find($student_id)
        ->update(['training_id' => $request->input('training')]);
        return redirect()->route('hr_manage_trainings', ['company_id' => $company_id]);
    }

    /**
     * delete a trainee form his training.
     *
     * @param  int  $company_id
     * @param  int  $student_id
     * @return \Illuminate\Http\Response
     */
    public function delete($company_id, $student_id)
    { 
        $company = Company::findOrFail($company_id);
        $unengaged_training = $company->trainings->first()->id;
        //dd($unengaged_training);
        Student::find($student_id)
        ->update(['training_id' => $unengaged_training]);
        return redirect()->route('hr_manage_trainings', ['company_id' => $company_id]);
    }
}
