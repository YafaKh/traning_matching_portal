<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator\Students;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Specialization;
use App\Models\Company;
use App\Models\UniversityEmployee;
use App\Models\Student_spoken_language;
use App\Models\Student_skill;
use App\Models\Preferred_training_field_student;
use App\Models\Preferred_cities_student;

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
    public function index($user_id)
    {
        $user = UniversityEmployee::where('id', $user_id)
        ->select('id', 'first_name', 'last_name', 'university_employee_role_id')->first();

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
        ['user' => $user,
        'students'=>$students,
        'specializations'=>$specializations,
        'companies'=>$companies,
        'supervisors'=>$supervisors,]);
    }

     /**
     * Remove the specified student from storage.
     */
    public function destroy($user_id, $student_id)
    {
        $student=  Student::findOrFail($student_id);
        $student->delete();
        $students = Student::select([
            'id', 'student_num', 'first_name_en', 'last_name_en', 'registered',
            'specialization_id', 'training_id'])->get();
        return redirect()->route('coordinator_list_students', ['students' => $students, 'user_id'=>$user_id]);
    }

    public function deleteSelectedStudents($user_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        // Get the selected student IDs from the query string
        $selectedStudentIds = explode(',', request('student_ids'));

        Student::whereIn('id', $selectedStudentIds)->delete();

        return redirect()->route('coordinator_list_students', ['user_id' => $user_id]);
    }
    /**
     * Update registration state for the students
     * by uploading a file with updated registration state
     */
    public function update_register_list(Request $request, $user_id)
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
        return redirect()->route('coordinator_list_students', ['students' => $students, 'user_id'=>$user_id]);
    }

        /**
     * Method show_student_profile
     *
     * @param $user_id $user_id [explicite description]
     * @param $student_id $student_id [explicite description]
     *
     * @return void
     */
    public function show_student_profile($user_id, $student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student =Student::find($student_id);
          // many to many relationship
        $allLanguages = Student_spoken_language::with('student', 'spokenLanguage')->where('student_id',$student_id)->get();
        $allSkills = Student_skill::with('student', 'skill')->where('student_id',$student_id)->get();
        $allPreferredTrainingFields = Preferred_training_field_student::with('student', 'preferredTrainingField')->where('student_id',$student_id)->get();
        $allPreferredCities = Preferred_cities_student::with('student', 'city')->where('student_id',$student_id)->get();

      //   one to many
        $specializationName = $student->specialization->name;

      
        return view('university_employee.coordinator.student_profile',compact('user', 'student','specializationName','allLanguages','allSkills','allPreferredTrainingFields','allPreferredCities'));  
    }

}