<?php

namespace App\Http\Controllers\Coordinator;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Student;

class StudentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //select from student id, student_id, name, specialization, company, branch, supervisor, regestrtion_state, progress, visit_form, evaluation, company_evaluation, assessment
        $studentsData= 
        Student::select(['id','student_num','student_name_id','specialization','company_id',''])
        ->get();
        return view('university_employee.coordinator.students.list',['students'=>$studentsData]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //view student profile
        $studentsData= Student::all();
        return view('all_users.profile',['students'=>$studentsData]);
    }

    /**
     * Update the specified resource in storage.
     * update registration state, by uploading the students registration state
     * in the list student page
     */
    public function update_registration_state(Request $request)
    {
        $request->validate();
        //for each student in the database
        $universityEmployee=UniversityEmployee::where('id',$id)->first();
        $universityEmployee->update([$request->input('registration_state')]);
    }

    /* update the approvel for the student with a specific company  
       from the student-compant page
    */
    public function company_approval(Request $request, string $student_id, string $company_id)
    {
        $student=Student::where('id',$student_id)->first();
        //update
        $universityEmployee->update();
    }

    /* update the super who assgined for a group of students  
       from the student-compant page
    */
    public function assgin_supervisor(Request $request, string $id)
    {
        $student=Student::where('id',$id)->first();
        //update on university employee role student table
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $student=  Student::where('id',$id)->first();
        $student->delete();
        index();
    }
}
