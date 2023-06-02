<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator\Students;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\UniversityEmployee;

use Illuminate\Http\Request;

class AssignSupervisorsController extends Controller
{
    public function index()
    {
        $supervisors = UniversityEmployee::where('university_employee_role_id', 2)
        ->orWhere('university_employee_role_id', 3)->get();
        
        $assigned_students= Student::select(['id', 'student_num', 'first_name_en',
         'last_name_en', 'registered','training_id','university_employee_id'])->whereHas('supervisor')
         ->defaultOrder()->get();

         $unassigned_students= Student::select(['id', 'student_num', 'first_name_en',
         'last_name_en', 'registered','training_id'])->whereDoesntHave('supervisor')
         ->defaultOrder()->get();

        return view('university_employee.coordinator.students.assign_supervisors', [
            'supervisors' => $supervisors, 
            'assigned_students' => $assigned_students,
            'unassigned_students' => $unassigned_students
        ]);
    }

    /** Assign this supervisor for this student/s
    */
    public function add(Request $request, string $student_id)
    {
        $request->validate([
            'supervisor' => 'required|exists:university_employees,id',
        ]);

        $student = Student::find($student_id);
        $student->university_employee_id = (int) $request->input('supervisor');
        $student->save();

        return redirect()->route('coordinator_manage_supervisors');
    }

    /** Remove this student/s from this supervisor's supervision
    */
    public function delete(Request $request, string $student_id)
    {
        $student = Student::find($student_id);
        $student->university_employee_id = NULL;
        $student->save();

        return redirect()->route('coordinator_manage_supervisors');
    }
}
