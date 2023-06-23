<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentCompanyApproval;
use App\Models\Specialization;
use App\Models\Company;
use App\Models\CompanyEmployee;

class UniversityStudentsController extends Controller
{
    /**
     * List all university students with some info.
     *
     * @param  int  $company_id
     * @return \Illuminate\Http\Response
     */
    public function index($company_id, $user_id)
    {
        //to edit Remove approved ones and ones who already sensed a req.
        $company = Company:: findOrFail($company_id);
        $user = CompanyEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name')->first();

        //dd($company->not_approved_students);
        $students = Student::whereDoesntHave('training')
        ->whereNotIn('id', $company->not_approved_students->pluck('student_id'))
        ->select('id', 'first_name_en', 'last_name_en', 'gpa'
        , 'load', 'availability_date', 'specialization_id')->defaultOrder()->get();

       // dd($students);
        //for fillters:
        $specializations =Specialization::select('name')->get();
        return view('company_employee.hr.trainees.university_students', [
        'company_id' => $company_id,
        'user' => $user,
        'students' => $students,
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
    public function add($company_id, $user_id, $student_id)
    {
        $user = CompanyEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name')->first();

        $approval = StudentCompanyApproval::create([
            'company_id' => $company_id,
            'student_id' => $student_id,
        ]);
        return redirect()->route('hr_university_students', 
        ['company_id' => $company_id, 'user_id' => $user_id]);
    }
    public function addSelectedTrainees($company_id, $user_id)
    {
        // Get the selected student IDs from the query string
        $selectedStudentIds = explode(',', request('student_ids'));

        // Perform the necessary operations to add the selected students
        foreach ($selectedStudentIds as $studentId) {
            $approval = StudentCompanyApproval::create([
                'company_id' => $company_id,
                'student_id' => $studentId,
            ]);
        }

        return redirect()->route('hr_university_students', ['company_id' => $company_id, 'user_id' => $user_id]);
    }

}
