<?php

namespace App\Http\Controllers\Coordinator\Students;

use Illuminate\Http\Request;

class StudentCompanyApprovalController extends Controller
{
   /** update the approvel for the student with a specific company  
    */
    public function company_approval(Request $request, string $student_id, string $company_id)
    {
        $student=Student::where('id',$student_id)->first();
        //update
        $universityEmployee->update();

        //dlete all ther requests
    }



}
