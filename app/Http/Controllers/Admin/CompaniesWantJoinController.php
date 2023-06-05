<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class CompaniesWantJoinController extends Controller
{
    public function show_comapnies_want_join(){
        // $companiesToJoin =Skill::all();

return view('admin.companies_want_Join');
}
}
