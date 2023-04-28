<?php

namespace App\Http\Controllersrs\Coordinator\Students;

use Illuminate\Http\Request;

class AssignSupervisorsController extends Controller
{
    //filtering
//student_id must be a list!!!!
    /** Assign this supervisor for this student/s
    */
    public function add(Request $request, string $supervisor_id, string $student_id)
    {
        $student=Student::where('id',$id)->first();
        //update on university employee role student table
    }

    /** Remove this student/s from this supervisor's supervision
    */
    public function delete(Request $request, string $supervisor_id, string $student_id)
    {
        $student=Student::where('id',$id)->first();
        //update on university employee role student table
    }
}
