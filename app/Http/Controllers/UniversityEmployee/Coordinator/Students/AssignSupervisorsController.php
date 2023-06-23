<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator\Students;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\UniversityEmployee;
use App\Models\Company;

use Illuminate\Http\Request;

class AssignSupervisorsController extends Controller
{
    public function index($user_id)
    {
        $user = UniversityEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name')->first();

        $supervisors = UniversityEmployee::where('active', 1)
        ->where(function ($query) {
            $query->where('university_employee_role_id', 2)
                ->orWhere('university_employee_role_id', 3);
        })->get();
    
        
        $assigned_students= Student::select(['id', 'student_num', 'first_name_en',
         'last_name_en', 'registered','training_id','university_employee_id'])->whereNotNull('university_employee_id')
         ->defaultOrder()->paginate(10);

         $unassigned_students= Student::select(['id', 'student_num', 'first_name_en',
         'last_name_en', 'registered','training_id'])->whereNull('university_employee_id')
         ->defaultOrder()->get();

         $companies = Company::select('id', 'name')->get();

        return view('university_employee.coordinator.students.assign_supervisors', [
            'user' => $user,
            'supervisors' => $supervisors,
            'companies'=>$companies, 
            'assigned_students' => $assigned_students,
            'unassigned_students' => $unassigned_students,
        ]);
    }

    /** Assign this supervisor for this student/s
    */
    public function add(Request $request, $user_id, $student_id)
    {
        $request->validate([
            'supervisor' => 'required|exists:university_employees,id',
        ]);

        $student = Student::find($student_id);
        $student->university_employee_id = (int) $request->input('supervisor');
        $student->save();

        return redirect()->route('coordinator_manage_supervisors', $user_id);
    }

    /** Remove this student/s from this supervisor's supervision
    */
    public function delete(Request $request, $user_id, $student_id)
    {
        $student = Student::find($student_id);
        $student->university_employee_id = NULL;
        $student->save();

        return redirect()->route('coordinator_manage_supervisors', $user_id);
    }
}
