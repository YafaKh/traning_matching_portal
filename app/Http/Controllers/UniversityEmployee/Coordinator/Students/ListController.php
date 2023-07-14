<?php

namespace App\Http\Controllers\UniversityEmployee\Coordinator\Students;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\Specialization;
use App\Models\Company;
use App\Models\UniversityEmployee;
use App\Models\Progress;
use App\Models\CompanyBranch;
use Illuminate\Http\Request;

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
    // filtering list of student
    public function filterStudents(Request $request, $user_id)
    {
        $query = Student::query();
    
        if ($request->ajax()) {
            $registrationState = $request->registration_state == 'true'; // Convert the string value to a boolean
    
            $students = $query
                ->where('university_employee_id', $user_id)
                ->where('registration_state', $registrationState) // Filter by registration state
                ->get();
    
            // Prepare the response data
            $responseStudents = $students->map(function ($student) {
                return [
                    'id' => $student->id,
                    'student_num' => $student->student_num,
                    'first_name_en' => $student->first_name_en,
                    'second_name_en' => $student->second_name_en,
                    'third_name_en' => $student->third_name_en,
                    'last_name_en' => $student->last_name_en,
                    'university_employee_id' => $student->university_employee_id,
                    'company_name' => $student->training->branch->company ? $student->training->branch->company->name : '',
                    'branch_name' => $student->training->branch ? $student->training->branch->address : '',
                    'university_employee_name' => $student->employee ? $student->employee->name : '',
                ];
            });
    
            return response()->json(['students' => $responseStudents]);
        }
    
        $students = $query
            ->where('university_employee_id', $user_id)
            ->get();
    
        return view('university_employee.coordinator.students.filtered-students', compact('students', 'user_id'));
    }
    
    // searching
    public function search($user_id)
    {
        $search_text = $_GET['search']; // name of the search input
    
        $user = UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->find($user_id);
        $students = $user->students()->where('first_name_en', 'LIKE', '%' . $search_text . '%');
    
        // $students = $user->students()->where(function ($query) use ($search_text) {
        //     $query->where('first_name_en', 'LIKE', '%' . $search_text . '%')
        //         ->orWhere('last_name_en', 'LIKE', '%' . $search_text . '%')
        //         ->orWhere('student_num', 'LIKE', '%' . $search_text . '%');
        // })->get();
    
        $specializations = Specialization::all();
        $companies = Company::all();
        $branches = CompanyBranch::all();
        $supervisors = UniversityEmployee::whereIn('University_employee_role_id', [2, 3])->get();
    
        return view('university_employee.coordinator.students.search', compact('students', 'user', 'specializations', 'companies', 'branches', 'supervisors'));
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
        $student = Student::where('id', $student_id)->first();;
        return view('university_employee.coordinator.student_profile',compact('user','student'));  
    }

    public function showProgressPage($user_id,$student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();

        if ($student == null) {
            return "Student not found";
        }
        $studentProgress =Progress::where('student_id',$student_id)->get();

        return view('university_employee.coordinator.progress', compact('user', 'student','studentProgress'));

    }
    public function show_visits($user_id,$student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();

        $visits =$student->visits;

        return view('university_employee.coordinator.visits', compact('user', 'student','visits'));

    }

    public function show_student_evaluation($user_id,$student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();

        $evaluation_data =$student->evaluate_student;
        return view('university_employee.coordinator.student_evaluation', 
        ['user'=>$user, 
        'student'=> $student,
        'evaluation_data'=>$evaluation_data]);

    }

    public function show_company_evaluation($user_id,$student_id)
    {
        $user = UniversityEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();

        $evaluation_data =$student->evaluate_company;
        if ($evaluation_data==null) {
            return "No evaluation yet ";
        }

        return view('university_employee.coordinator.company_evaluation', compact('user', 'student','evalusation_data'));

    }
}