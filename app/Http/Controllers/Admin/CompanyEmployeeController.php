<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Company;

class CompanyEmployeeController extends Controller
{
    public function index(){
        $companies = Company::select('id','name')
        ->with('employees')->paginate(1);
        return view('admin.companies_employees', ['companies'=>$companies]);
    }
}
