<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentCompanyApproval;
use App\Models\Specialization;
use App\Models\Company;

class UniversityStudentsController extends Controller
{
    /**
     * List all university students with some info.
     *
     * @param  int  $company_id
     * @return \Illuminate\Http\Response
     */
    public function index($company_id)
    {
        //to edit Remove approved ones and ones who already sensed a req.
        $company = Company:: findOrFail($company_id);

        //dd($company->not_approved_students);
        $students = Student::whereDoesntHave('training')
        ->whereNotIn('id', $company->not_approved_students->pluck('student_id'))
        ->select('id', 'first_name_en', 'last_name_en', 'gpa'
        , 'load', 'availability_date', 'specialization_id')->defaultOrder()->paginate(15);
        //for fillters:
        $specializations =Specialization::select('name')->get();
        return view('company_employee.hr.trainees.university_students', [
        'students' => $students,
        'company_id' => $company_id,
        'specializations' => $specializations
        ]);
    }

    /**
     * Add a new trainee from university students.
     *
     * @param  int  $company_id
     * @param  int  $student_id
     * @return \Illuminate\Http\Response
     */
    public function add($company_id, $student_id)
    {
        $approval = StudentCompanyApproval::create([
            'company_id' => $company_id,
            'student_id' => $student_id,
        ]);
//to edit, add many
        return redirect()->route('hr_university_students', ['company_id' => $company_id]);
    }
}
