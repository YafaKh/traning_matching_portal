<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Collection;
use App\Models\Company;
use App\Models\Student;
use App\Models\CompanyEmployee;

class AssignTrainingController extends Controller
{  
    /**
     * Method index
     *
     * @param $company_id $company_id [explicite description]
     *
     * @return void
     */
    public function index($company_id, $user_id)
    {
        $company = Company::findOrFail($company_id);
        $user = CompanyEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name')->first();
        
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
            'company_id' => $company_id,
            'user' => $user,
            'trainings' => $trainings->reject(function ($training) {
                return $training->name == 'Unengaged Trainees';}),
            'unengaged_students' => $unengaged_students,
            'engaged_students' => $engaged_students,
        ]);
    }
    
    
    /**
     * Method add
     *
     * @param Request $request [explicite description]
     * @param $company_id $company_id [explicite description]
     * @param $user_id $user_id [explicite description]
     *
     * @return void
     */
    public function add(Request $request, $company_id, $user_id)
    {
        $user = CompanyEmployee::where('id', $user_id)
            ->select('id', 'first_name', 'last_name')->first();
    
        $request->validate([
            'training' => 'required|exists:trainings,id',
            'students' => 'required|array',
        ]);
    
        $trainingId = $request->input('training');
        $studentIds = $request->input('students');
    
        // Update training for selected students
        Student::whereIn('id', $studentIds)
            ->update(['training_id' => $trainingId]);
    
        return redirect()->route('hr_manage_trainings', ['company_id' => $company_id, 'user_id' => $user_id]);
    }    
    
    /**
     * Method delete
     *
     * @param $company_id $company_id [explicite description]
     * @param $user_id $user_id [explicite description]
     *
     * @return void
     */
    public function delete($company_id, $user_id)
    {
        $student_ids = request('student_ids', []);
        $company = Company::findOrFail($company_id);
        $unengaged_training = $company->trainings->first()->id;
        Student::whereIn('id', $student_ids)->update(['training_id' => $unengaged_training]);

        return redirect()->route('hr_manage_trainings', ['company_id' => $company_id, 'user_id' => $user_id]);
    }
}
