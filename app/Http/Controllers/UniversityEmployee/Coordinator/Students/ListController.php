<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator\Students;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Specialization;
use App\Models\Company;
use App\Models\UniversityEmployee;

use Illuminate\Http\Request;

use Illuminate\Support\Facades;
use Illuminate\Validation\Rules\File;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;
use Illuminate\Support\Arr;


class ListController extends Controller
{
     /**
     * list all university students with some info
     */
    public function index()
    {
        $students= Student::select([
        'id', 'student_num', 'first_name_en', 'last_name_en', 'registered',
        'specialization_id', 'training_id','university_employee_id'])
        ->defaultOrder()->paginate(15);
       // dd($students);

        $specializations = Specialization::select('acronyms')->get();
        $companies = Company::select('id', 'name')->get();
        $supervisors =  UniversityEmployee::where(function ($query) {
        $query->where('university_employee_role_id', 2)
        ->orWhere('university_employee_role_id', 3);})->get();

        return view('university_employee.coordinator.students.list',
        ['students'=>$students,
        'specializations'=>$specializations,
        'companies'=>$companies,
        'supervisors'=>$supervisors,]);
    }

     /**
     * Remove the specified student from storage.
     */
    public function destroy($student_id)
    {
        $student=  Student::findOrFail($student_id);
        $student->delete();
        $students = Student::select([
            'id', 'student_num', 'first_name_en', 'last_name_en', 'registered',
            'specialization_id', 'training_id'])->get();
        return redirect()->route('coordinator_list_students', ['students' => $students]);
    }

    /**
     * Update registration state for the students
     * by uploading a file with updated registration state
     */
    public function update_register_list(Request $request)
    {
        $request->validate([
            'register_list' => 'required|mimes:txt',
        ]);
        $path = $request->file('register_list')->getRealPath();
        $contents = file_get_contents($path);
        $registered_students= explode("\n", $contents);
        $registered_students = array_map('trim', $registered_students);
        $students = Student::select([
            'id', 'student_num', 'first_name_en', 'last_name_en', 'registered',
            'specialization_id', 'training_id'])->get();
        foreach ($students as $student) {
            if (in_array($student->student_num, $registered_students)) {
                $student->registered = true;
            } else {
                $student->registered = false;
            }
            
            $student->save();
        }
        return redirect()->route('coordinator_list_students', ['students' => $students]);
    }

}