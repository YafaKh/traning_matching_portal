<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Student;

class StudentController extends Controller
{
    public function index(){
        $students= Student::select([
            'id', 'first_name_en', 'last_name_en',
            'specialization_id', 'training_id'])
            ->defaultOrder()->paginate(15);        
        return view('admin.students', ['students'=>$students]);
    }
}
