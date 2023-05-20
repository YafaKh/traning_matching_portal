<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;
use App\Http\Controllers\Coordinator\StudentController;
use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Student\EditStudentProfileController;
use App\Http\Controllers\Student\StudentRegisterController;
use App\Http\Controllers\Student\EvaluateCompanyController;
use App\Http\Controllers\CompanyEmployee\RegisterController;
use App\Http\Controllers\CompanyEmployee\HR\Trainees\ListController as ListController1;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\CompanyEmployee\HR\Trainees\UniversityStudentsController;
use App\Http\Controllers\CompanyEmployee\HR\Trainees\TraineesTrainingController;
use App\Http\Controllers\CompanyEmployee\HR\CompanyEmployeeController;
use App\Http\Controllers\CompanyEmployee\HR\TrainingController;
use App\Http\Controllers\CompanyEmployee\HR\CompanyProfileController;

Route::get('/', function () {
    return view('/all_users/login');
}); 
Route::get('/resetPassword', function () {
    return view('/all_users/resetPassword');
}); 
Route::get('/userType', function () {
    return view('/all_users/userType');
}); 


// university employees' routes
Route::get('university_employee/register', function () {
    return view('/university_employee/register'); })->name('university_employee_register');

Route::prefix('/coordinator')->group(function(){
    Route::prefix('/students')->group(function(){
        Route::get('/list', [StudentController::class,'index'])->name('coordinator_list_students');
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

Route::prefix('/supervisor')->group(function(){
    Route::get('/students', function () {
        return view('university_employee/supervisor/students'); })->name('supervisor_list_students');   
    Route::prefix('/visit_forms')->group(function(){
        Route::get('/', function () {
            return view('university_employee/supervisor/visit_forms/list'); })->name('list_visit_forms');
        Route::get('/create', function () {
            return view('university_employee/supervisor/visit_forms/create'); })->name('fill_visit_form');
        Route::get('/id', function () {
            return view('university_employee/supervisor/visit_forms/student_visit_forms'); })->name('student_visit_forms');
        
        });
});   

// company employees' routes
Route::get('company_employee/register',[RegisterController::class,'create'])->name('company_employee_register');
Route::post('company_employee/register/store',[RegisterController::class,'store'])->name('company_employee_store');

Route::prefix('/{company_id}/hr')->group(function(){
    Route::get('/company_profile', [CompanyProfileController::class, 'index'])->name('hr_company_profile');

    Route::get('/edit_company_profile', [CompanyProfileController::class, 'edit'])->name('hr_edit_company_profile');

    Route::prefix('/trainees')->group(function(){
        Route::get('/', [ListController1::class, 'index'])->name('hr_list_trainees');
        Route::get('/university_students',[UniversityStudentsController::class,'index'])->name('hr_university_students');
        Route::get('/add_trainee/{student_id}', [UniversityStudentsController::class, 'add'])->name('hr_add_trainee');
        Route::get('/trainees_trainings', [TraineesTrainingController::class,'index'])->name('hr_trainees_trainings');
        Route::get('/assign_training/{student_id}', [TraineesTrainingController::class,'add'])->name('hr_assign_training');
    });

    Route::prefix('/company_employees')->group(function(){
        Route::get('/', [CompanyEmployeeController::class,'index'])->name('hr_list_Employees');
        Route::get('/create', [CompanyEmployeeController::class,'create'])->name('hr_add_Employee');
        Route::post('/store', [CompanyEmployeeController::class,'store'])->name('hr_store_Employee');
    });

    Route::prefix('/trainings')->group(function(){
        Route::get('/', [TrainingController::class,'index'])->name('hr_list_trainings');
        Route::get('/create', [TrainingController::class,'create'])->name('hr_add_training');
        Route::post('/store', [TrainingController::class,'store'])->name('hr_store_training');
    });
});

//students' routes

Route::prefix('/student')->group(function () {
    Route::get('/registeration',[StudentRegisterController::class,'create'])->name('student_registeration_1');
    Route::get('/registeration_2',[StudentRegisterController::class,'createNextPage'])->name('student_registeration_2');
    Route::get('/profile',[StudentProfileController::class,'show'])->name('student_profile');
    Route::get('/edit_profile',[EditStudentProfileController::class,'show'])->name('edit_student_profile');
    Route::get('/evaluate_company',[EvaluateCompanyController::class,'show'])->name('student_evaluate_company');
    Route::get('/list',[StudentRegisterController::class,'test'])->name('test');

})->name('student');



Route::post('/store',[StudentRegisterController::class,'store'])->name('student_store');

// admin 
Route::prefix('/admin')->group(function () {
    Route::get('/',[AdminController::class,'show'])->name('admin_home');
    Route::get('/copmanies',[AdminController::class,'show_comapnies'])->name('admin_copmanies');
    Route::get('/comapnies_want_to_join',[AdminController::class,'show_comapnies_want_join'])->name('admin_compnies_want_to_join');
    
})->name('admin');

// trainer
Route::prefix('/trainer')->group(function(){
    Route::prefix('/trainees')->group(function(){
        Route::get('/', function () {
            return view('company_employee/trainer/trainees/list'); })->name('trainer_list_traniees');   
        Route::get('/progress', function () {
            return view('company_employee/trainer/trainees/progress'); })->name('fill_traniee_progress');
        Route::get('/evaluation', function () {
            return view('company_employee/trainer/trainees/evaluation'); })->name('fill_traniee_evaluation');  
    });
});