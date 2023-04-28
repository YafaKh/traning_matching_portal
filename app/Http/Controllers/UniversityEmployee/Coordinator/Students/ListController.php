<?php

namespace App\Http\Controllersrs\Coordinator\Students;

use Illuminate\Http\Request;

class ListController extends Controller
{
    //filtering

     /**
     * list all university students with some info
     */
    public function index()
    {
        //select from student id, student_id, name, specialization, company, branch, supervisor, regestrtion_state, progress, visit_form, evaluation, company_evaluation, assessment
       /* $studentsData= 
        Student::select(['id','student_num','student_name_id','specialization','company_id',''])
        ->get();*/
        return view('university_employee.coordinator.students.list');//,['students'=>$studentsData]);
    }

    /**
     * update registration state for the students
     * by uploading a file with updated registration state
     */
    public function update_registration_state(Request $request)
    {
        $request->validate();
        //for each student in the database
        $universityEmployee=UniversityEmployee::where('id',$id)->first();
        $universityEmployee->update([$request->input('registration_state')]);
    }

     /**
     * Remove the specified student from storage.
     */
    public function destroy(string $id)
    {
        $student=  Student::where('id',$id)->first();
        $student->delete();
        index();
    }
}
