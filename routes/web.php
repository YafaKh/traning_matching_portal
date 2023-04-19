<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('/all_users/login');
});
// university employees' routes
Route::get('university_employee/register', function () {
    return view('/university_employee/register'); })->name('university_employee_register');

Route::prefix('/coordinator')->group(function(){
    Route::prefix('/students')->group(function(){
        Route::get('/list_students', function () {
            return view('university_employee/coordinator/students/list_students'); })->name('coordinator_list_students');
        Route::get('/student_company_approval', function () {
            return view('university_employee/coordinator/students/student_company_approval'); })->name('coordinator_student_company_approval');
        Route::get('/assign_supervisors', function () {
            return view('university_employee/coordinator/students/assign_supervisors'); })->name('coordinator_assign_supervisors');
            //add id
        Route::get('/assessment', function () {
            return view('university_employee/coordinator/students/assessment'); })->name('coordinator_student_assessment');    
    });

    Route::prefix('/university_employees')->group(function(){
        Route::get('/', function () {
            return view('university_employee/coordinator/university_employees/list'); })->name('coordinator_list_Employees');
        Route::get('/add', function () {
        return view('university_employee/coordinator/university_employees/add'); })->name('coordinator_add_Employee');
    });

    Route::get('/companies', function () {
        return view('university_employee/coordinator/companies'); })->name('coordinator_list_companies');   
});

// company employees' routes
Route::get('company_employee/register', function () {
    return view('/company_employee/register'); })->name('company_employee_register');
 
Route::prefix('/hr')->group(function(){
    Route::get('/company_profile', function () {
        return view('/hr/company_profile'); })->name('hr_company_profile');
    });

// students' routes
Route::prefix('/student')->group(function() {
    Route::get('/profile',function(){
        return view('/student/profile'); });});