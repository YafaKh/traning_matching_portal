<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator\Students;
use App\Http\Controllers\Controller;
use App\Models\Student;

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
        'specialization_id', 'training_id'])->defaultOrder()->get();
        return view('university_employee.coordinator.students.list',['students'=>$students]);
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
            if (in_array((string)$student->student_num, $registered_students)) {
                $student->registered = true;
            } else {
                $student->registered = false;
            }
            
            $student->save();
        }
        return redirect()->route('coordinator_list_students', ['students' => $students]);
    }

}