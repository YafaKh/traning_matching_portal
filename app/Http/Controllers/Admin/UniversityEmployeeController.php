<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\universityEmployee;

class UniversityEmployeeController extends Controller
{
    public function index(){
        $employees = universityEmployee::all();
        return view('admin.university_employees', ['employees'=>$employees]);
    }
}
