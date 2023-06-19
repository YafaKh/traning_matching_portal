<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Http\Controllers\AllUsers\CompanyProfileController as AllCompanyProfileController;

use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Student\EditStudentProfileController;
use App\Http\Controllers\Student\StudentRegisterController;
use App\Http\Controllers\Student\EvaluateCompanyController;
use App\Http\Controllers\CompanyEmployee\RegisterController;
use App\Http\Controllers\CompanyEmployee\HR\Trainees\ListController as HrListController;

use App\Http\Controllers\CompanyEmployee\HR\Trainees\UniversityStudentsController;
use App\Http\Controllers\CompanyEmployee\HR\Trainees\AssignTrainingController;
use App\Http\Controllers\CompanyEmployee\HR\CompanyEmployeeController as HrCompanyEmployeeController;
use App\Http\Controllers\CompanyEmployee\HR\TrainingController;
use App\Http\Controllers\CompanyEmployee\Trainer\TrainerController;
use App\Http\Controllers\CompanyEmployee\Trainer\progressController;
use App\Http\Controllers\CompanyEmployee\HR\CompanyProfileController as HrCompanyProfileController;

use App\Http\Controllers\UniversityEmployee\Coordinator\Students\ListController as CooListController;
use App\Http\Controllers\UniversityEmployee\Coordinator\Students\StudentCompanyApprovalController;
use App\Http\Controllers\UniversityEmployee\Coordinator\Students\AssignSupervisorsController;
use App\Http\Controllers\UniversityEmployee\Coordinator\UniversityEmployeeController as CooUniversityEmployeeController;
use App\Http\Controllers\UniversityEmployee\Coordinator\CompaniesController as CooCompaniesController;

use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CompaniesController as AdminCompaniesController;
use App\Http\Controllers\Admin\CompaniesWantJoinController;
use App\Http\Controllers\Admin\CompanyEmployeeController as AdCompanyEmployeeController;
use App\Http\Controllers\Admin\UniversityEmployeeController as AdUniversityEmployeeController;
use App\Http\Controllers\Admin\StudentController;

Route::get('/', function () {
    return view('/all_users/login');
})->name('login'); 
Route::get('/reset_password', function () {
    return view('/all_users/reset_password');
})->name('reset_password'); 
Route::get('/user_type', function () {
    return view('/all_users/userType');
})->name('user_type'); 

//all users 
Route::get('/{company_id}/company_profile', [AllCompanyProfileController::class, 'show'])->name('show_company_profile');

// university employees' routes
Route::get('university_employee/register', function () {
    return view('/university_employee/register'); })->name('university_employee_register');

Route::prefix('/coordinator')->group(function(){
    Route::prefix('/students')->group(function(){
        Route::post('/update_register_list', [CooListController::class,'update_register_list'])->name('update_register_list');
        Route::get('/', [CooListController::class,'index'])->name('coordinator_list_students');
        Route::get('/destroy/{student_id}', [CooListController::class,'destroy'])->name('coordinator_delete_student');
        Route::get('/students_companies_approval', [StudentCompanyApprovalController::class, 'index'])->name('coordinator_students_companies_approval');
        Route::get('/student_company_approve/{not_approved_student_company}', [StudentCompanyApprovalController::class, 'approve'])->name('coordinator_student_company_approve');
        Route::get('/assign_supervisors', [AssignSupervisorsController::class, 'index'])->name('coordinator_manage_supervisors');
        Route::post('/assign_supervisor/{student_id}', [AssignSupervisorsController::class,'add'])->name('coordinator_assign_supervisor');
        Route::get('/unassign_supervisor/{student_id}', [AssignSupervisorsController::class,'delete'])->name('coordinator_unassign_supervisor');
    
        Route::get('/assessment', function () {
            return view('university_employee/coordinator/students/assessment'); })->name('coordinator_student_assessment');    
    });

    
    Route::prefix('/university_employees')->group(function(){
        Route::get('/', [CooUniversityEmployeeController::class, 'index'])->name('coordinator_list_employees');
        Route::get('/create', [CooUniversityEmployeeController::class,'create'])->name('coordinator_add_employee');
        Route::post('/store', [CooUniversityEmployeeController::class,'store'])->name('coordinator_stroe_employee');
        Route::get('/delete/{employee_id}', [CooUniversityEmployeeController::class, 'destroy'])->name('coordinator_delete_employee');
    });
    
    Route::get('/companies',  [CooCompaniesController::class, 'index'])->name('coordinator_list_companies');   
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

Route::prefix('{company_id}/hr')->group(function () {
    Route::get('/company_profile', [HrCompanyProfileController::class, 'index'])->name('hr_company_profile');
    Route::get('/edit_company_profile', [HrCompanyProfileController::class, 'edit'])->name('hr_edit_company_profile');
    Route::post('/edit_company_profile', [HrCompanyProfileController::class, 'update'])->name('hr_update_company_profile');
    //Route::get('/delete_branch', [HrCompanyProfileController::class, 'delete_branch'])->name('hr_delete_branch');

    Route::prefix('/trainees')->group(function(){
        Route::get('/', [HrListController::class, 'index'])->name('hr_list_trainees');
        Route::get('/university_students',[UniversityStudentsController::class,'index'])->name('hr_university_students');
        Route::get('/add_trainee/{student_id}', [UniversityStudentsController::class, 'add'])->name('hr_add_trainee');
        Route::get('/assign_trainings', [AssignTrainingController::class,'index'])->name('hr_manage_trainings');
        Route::post('/assign_training/{student_id}', [AssignTrainingController::class,'add'])->name('hr_assign_training');
        Route::get('/unassign_training/{student_id}', [AssignTrainingController::class,'delete'])->name('hr_unassign_training');
    });

    Route::prefix('/company_employees')->group(function(){
        Route::get('/', [HrCompanyEmployeeController::class,'index'])->name('hr_list_employees');
        Route::get('/create', [HrCompanyEmployeeController::class,'create'])->name('hr_add_employee');
        Route::post('/store', [HrCompanyEmployeeController::class,'store'])->name('hr_store_employee');
        Route::get('/delete/{employee_id}', [HrCompanyEmployeeController::class, 'destroy'])->name('hr_delete_employee');
    });

    Route::prefix('/trainings')->group(function(){
        Route::get('/', [TrainingController::class,'index'])->name('hr_list_trainings');
        Route::get('/create', [TrainingController::class,'create'])->name('hr_add_training');
        Route::post('/store', [TrainingController::class,'store'])->name('hr_store_training');
        Route::get('/delete/{training_id}', [TrainingController::class, 'destroy'])->name('hr_delete_training');
    });
});

//students' routes

Route::prefix('/student')->group(function () {
    Route::get('/registeration{id}',[StudentRegisterController::class,'create'])->name('student_registeration_1');
    Route::POST('/registeration/store',[StudentRegisterController::class,'store'])->name('student_registeration_1.store');

    Route::get('/profile{id}',[StudentProfileController::class,'show'])->name('student_profile');
    Route::get('/edit_profile',[EditStudentProfileController::class,'show'])->name('edit_student_profile');
    Route::get('/evaluate_company{id}',[EvaluateCompanyController::class,'show'])->name('student_evaluate_company');
    Route::POST('/evaluate_company/add',[EvaluateCompanyController::class,'add'])->name('student_evaluate_company.add');

    Route::get('/list{id}',[StudentRegisterController::class,'test'])->name('test');

})->name('student');


// Route::post('/store',[StudentRegisterController::class,'store'])->name('student_store');

Route::post('store{id}',[StudentRegisterController::class,'addManyLanguageToStudent'])->name('student_store');
// Route::post('/lang-save',[StudentRegisterController::class,'addManyLanguageToStudent'])->name('student_storing_languge');

// Route::get('listSpec{id}',[StudentProfileController::class,'getSpecification'])->name('student_spec_list');


// admin 
Route::prefix('/admin')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('admin_home');
    Route::get('/companies',[AdminCompaniesController::class,'index'])->name('admin_companies');
    Route::get('/comapnies_want_to_join',[CompaniesWantJoinController::class,'index'])->name('admin_compnies_want_to_join');
    Route::get('/accept_company{company_id}',[CompaniesWantJoinController::class,'accept'])->name('admin_accept_company');
    Route::get('/reject_company{company_id}',[CompaniesWantJoinController::class,'reject'])->name('admin_reject_company');
    Route::get('/companies_employees',[AdCompanyEmployeeController::class,'index'])->name('admin_companies_employees');
    Route::get('/university_employees',[AdUniversityEmployeeController::class,'index'])->name('admin_university_employees');
    Route::get('/students',[StudentController::class,'index'])->name('admin_students');
});

// trainer
Route::prefix('/trainer')->group(function(){
    Route::prefix('/trainees')->group(function(){
        Route::get('/{id}',[TrainerController::class,'show'])->name('trainer_list_traniees');
        Route::get('/progress/{id}/{trainee_id}',[progressController::class,'show'])->name('fill_traniee_progress');
        Route::get('/progress/add/{id}/{trainee_id}',[progressController::class,'add'])->name('fill_traniee_progress.add');

        Route::get('/evaluation', function () {
            return view('company_employee/trainer/trainees/evaluation'); })->name('fill_traniee_evaluation');  
    });
});