<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator\Students;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Company;
use App\Models\StudentCompanyApproval;
use App\Models\UniversityEmployee;

use Illuminate\Http\Request;

class StudentCompanyApprovalController extends Controller
{
    /**
     * list all students who have unappreved company
     */
    public function index($user_id)
    {
        $user = UniversityEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name', 'university_employee_role_id')->first();

        $students = Student::whereHas('not_approved_companies')
        ->select(['id', 'student_num', 'first_name_en', 'last_name_en', 'registered'])
        ->defaultOrder()
        ->get();
        return view('university_employee.coordinator.students.student_company_approval',
        ['user' => $user,
        'students'=>$students]);
    }

    /**
     * Approve specific student with specific company
     */
    public function approve($user_id, $not_approved_student_company)
    {

        $not_approved=  StudentCompanyApproval::findOrFail($not_approved_student_company);
        $student=  Student::findOrFail($not_approved->student_id);
        $company=  Company::findOrFail($not_approved->company_id);
        $company_unengaged_training=$company->trainings[0];
        $student->training_id=$company_unengaged_training->id;
        $student->save();

        $all_student_records=StudentCompanyApproval::where('student_id', $student->id)->get();
        foreach($all_student_records as $student_record)
            $student_record->delete();

        $students = Student::select([
        'id', 'student_num', 'first_name_en', 'last_name_en', 'registered',])->get();
        
        return redirect()->route('coordinator_students_companies_approval', ['students' => $students, 'user_id'=>$user_id]);
    }

}
