<?php

namespace App\Http\Controllers\CompanyEmployee\HR\Trainees;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Student;
use App\Models\CompanyEmployee;
use App\Models\Progress;

class ListController extends Controller
{
    //filtering

     /**
     * @param  int  $id
     * list all company trainees with some info
     */
    public function index($user_id)
    {
       $user = CompanyEmployee::where('id', $user_id)->first();
       $company = $user->company;

       $trainings = $company->trainings->skip(1);
       $not_aaproved_students= $company->not_approved_students;
 
        //filters data
        $unengaged_trainees= ($company->trainings[0])->students;
        $branches= $company->branches;
        $trainers= $company->employees->whereIn('company_employee_role_id', [2, 3]);
        return view('company_employee.hr.trainees.list',
         [
         'user' => $user,
         'trainings' => $trainings,
          //'students_data' => $students_data,
          'not_aaproved_students' => $not_aaproved_students,
          'unengaged_trainees' => $unengaged_trainees,
          'branches' => $branches,
          'trainers' => $trainers,]);
    }
    // search for a rainee name
    public function search($user_id)
    {
        $search_text = $_GET['search']; // name of the search input
    
        $user = CompanyEmployee::find($user_id);
        $company = $user->company;
    
        // $trainings = $company->trainings->skip(1);
        //  dd($user->students());
       $trainings = $company->trainings()->where(function ($query) use ($search_text) {
            $query->where('name', 'LIKE', '%' . $search_text . '%');
        })->paginate(15);

        $not_aaproved_students= $company->not_approved_students;
        $unengaged_trainees= ($company->trainings[0])->students;
        $branches= $company->branches;
        $trainers= $company->employees->whereIn('company_employee_role_id', [2, 3]);
        
    
        return view('company_employee.hr.trainees.searchForTrainee', compact('user','company', 'trainings', 'not_aaproved_students', 'unengaged_trainees', 'branches', 'trainers'));
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
        $user = CompanyEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();;
        return view('company_employee.hr.student_profile',compact('user','student'));  
    }

        
    /**
     * Method showProgressPage
     *
     * @param $user_id $user_id [explicite description]
     * @param $student_id $student_id [explicite description]
     *
     * @return void
     */
    public function showProgressPage($user_id,$student_id)
    {
        $user = CompanyEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();

        if ($student == null) {
            return "Student not found";
        }
        $studentProgress =Progress::where('student_id',$student_id)->get();

        return view('company_employee.hr.progress', compact('user', 'student','studentProgress'));

    }
        /**
     * Method show_student_profile
     *
     * @param $user_id $user_id [explicite description]
     * @param $student_id $student_id [explicite description]
     *
     * @return void
     */
    public function show_student_evaluation($user_id,$student_id)
    {
        $user = CompanyEmployee::where('id', $user_id)->first();
        $student = Student::where('id', $student_id)->first();

        $evaluation_data =$student->evaluate_student;
        return view('company_employee.hr.student_evaluation', 
        ['user'=>$user, 
        'student'=> $student,
        'evaluation_data'=>$evaluation_data]);

    }
}
