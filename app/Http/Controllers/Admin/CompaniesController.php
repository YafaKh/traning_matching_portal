<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use App\Models\Company;

class CompaniesController extends Controller
{
    public function show_comapnies(){
        $allCompanies =Company::all();

        return view('admin.companies',compact('allCompanies'));
    }
}
