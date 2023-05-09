<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function show(){
        return view('admin.home');
    }
    public function show_comapnies_want_join(){
        return view('admin.companies_want_Join');
    }
    public function show_comapnies(){
        return view('admin.companies');
    }
    
}
