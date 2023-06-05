<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class HomeController extends Controller
{
    public function show(){

        return view('admin.home');
    }
    // copanies will be added (insert) from home page but what about table??
  
   
    
}
