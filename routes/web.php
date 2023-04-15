<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
});
Route::get('/coordinator', function () {
    return view('/coordinator/students/list_students');
});

Route::get('/coordinator/students/assign_supervisors', function () {
    return view('/coordinator/students/assign_supervisors');
});




// Route::get('/login', function () {
//     return view('login');
// });


Route::prefix('/coordinator')->group(function(){
    Route::get('/register', function () {
        return view('/coordinator/register'); });
    Route::prefix('/students')->group(function(){
        Route::get('/list_students', function () {
            return view('/coordinator/students/list_students'); });
        Route::get('/student_company_approval', function () {
            return view('/coordinator/students/student_company_approval'); });
        Route::get('/assign_supervisors', function () {
            return view('/coordinator/students/assign_supervisors'); });
            //add id
        Route::get('/assessment', function () {
            return view('/coordinator/students/assessment'); });    
    });
    Route::get('/supervisors', function () {
        return view('/coordinator/supervisors'); });
    Route::get('/companies', function () {
        return view('/coordinator/companies'); });   
});