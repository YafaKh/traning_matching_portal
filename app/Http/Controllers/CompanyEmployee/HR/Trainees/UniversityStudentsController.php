<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\StudentCompanyApproval;

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
        // Remove approved ones and ones who already sensed a req.
        $students = Student::select('id', 'first_name_en', 'last_name_en', 'gpa', 'load', 'availability_date', 'specialization_id')
        ->get();

    return view('company_employee.hr.trainees.university_students', [
        'students' => $students,
        'company_id' => $company_id
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

    return redirect()->route('hr_university_students', ['company_id' => $company_id]);
}
}
