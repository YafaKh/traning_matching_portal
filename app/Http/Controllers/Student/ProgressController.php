<?php

namespace App\Http\Controllers\Student;

use App\Models\Student;
use App\Models\Progress;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ProgressController extends Controller
{
/**
     * Method showProgressPage
     *
     * @param $user_id $user_id [explicite description]
     * @param $student_id $student_id [explicite description]
     *
     * @return void
     */
    public function showProgressPage($user_id)
    {
        $user = Student::where('id', $user_id)->first();
        $student=$user;      
        $studentProgress =Progress::where('student_id',$user_id)->get();

        return view('student.progress', compact('user', 'student','studentProgress'));

    }

}