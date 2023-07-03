<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Http\Controllers\AllUsers\AllUsersController;
use App\Http\Controllers\AllUsers\UserTypeController;
use App\Http\Controllers\AllUsers\LoginController;
use App\Http\Controllers\AllUsers\LogoutController;

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
use App\Http\Controllers\CompanyEmployee\Trainer\EvaluateController;
use App\Http\Controllers\CompanyEmployee\HR\CompanyProfileController as HrCompanyProfileController;

use App\Http\Controllers\UniversityEmployee\Coordinator\Students\ListController as CooListController;
use App\Http\Controllers\UniversityEmployee\Coordinator\Students\StudentCompanyApprovalController;
use App\Http\Controllers\UniversityEmployee\Coordinator\Students\AssignSupervisorsController;
use App\Http\Controllers\UniversityEmployee\Coordinator\UniversityEmployeeController as CooUniversityEmployeeController;
use App\Http\Controllers\UniversityEmployee\Coordinator\CompaniesController as CooCompaniesController;
use App\Http\Controllers\UniversityEmployee\Supervisor\StudentsController;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\CompaniesController as AdminCompaniesController;
use App\Http\Controllers\Admin\CompaniesWantJoinController;
use App\Http\Controllers\Admin\CompanyEmployeeController as AdCompanyEmployeeController;
use App\Http\Controllers\Admin\UniversityEmployeeController as AdUniversityEmployeeController;
use App\Http\Controllers\Admin\StudentController;

//all users 
Route::get('/home', function () {
    return view('/home');
})->name('home'); 

Route::get('/', function () {
    return view('/all_users/userType');
})->name('user_type'); 

Route::get('/{user_type}', [UserTypeController::class, 'login'])->name('login');
Route::post('/authenticate_{user_type}', [LoginController::class, 'authenticate'])->name('authenticate');
Route::post('/logout', [LogoutController::class, 'logout'])->name('logout');

Route::get('/reset_password', function () {
    return view('/all_users/reset_password');
})->name('reset_password'); 

// admin 
Route::prefix('/admin')->group(function () {
    Route::get('/',[HomeController::class,'index'])->name('admin_home');
    Route::get('/companies',[AdminCompaniesController::class,'index'])->name('admin_companies');
    Route::get('/company{company_id}_profile', [AdminCompaniesController::class, 'show_company_profile'])->name('admin_company_profile');
    Route::get('/comapnies_want_to_join',[CompaniesWantJoinController::class,'index'])->name('admin_compnies_want_to_join');
    Route::get('/accept_company{company_id}',[CompaniesWantJoinController::class,'accept'])->name('admin_accept_company');
    Route::get('/reject_company{company_id}',[CompaniesWantJoinController::class,'reject'])->name('admin_reject_company');
    Route::get('/companies_employees',[AdCompanyEmployeeController::class,'index'])->name('admin_companies_employees');
    Route::get('/university_employees',[AdUniversityEmployeeController::class,'index'])->name('admin_university_employees');
    Route::get('/students',[StudentController::class,'index'])->name('admin_students');
});

// university employees' routes
Route::get('university_employee/register', function () {
    return view('/university_employee/register'); })->name('university_employee_register');

Route::prefix('/coordinator/{user_id}')->group(function(){
    Route::prefix('/students')->group(function(){
        Route::get('/', [CooListController::class,'index'])->name('coordinator_list_students');
        Route::post('/update_register_list', [CooListController::class,'update_register_list'])->name('update_register_list');
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
        Route::get('/update_role/{employee_id}', [CooUniversityEmployeeController::class, 'update_role'])->name('coordinator_update_role');
    });
    
    Route::get('/companies',  [CooCompaniesController::class, 'index'])->name('coordinator_list_companies');   
    Route::get('/company{company_id}_profile', [CooCompaniesController::class, 'show_company_profile'])->name('coordinator_company_profile');
});

Route::prefix('/supervisor')->group(function(){
    Route::prefix('/students')->group(function(){

    Route::get('/{user_id}', [StudentsController::class, 'index'])->name('supervisor_list_students');
    Route::get('/progress/{user_id}/{student_id}', [StudentsController::class, 'showProgressPage'])->name('show_student_progress');
    Route::get('/evaluation/{user_id}/{student_id}', [StudentsController::class, 'showEvaluateStudentPage'])->name('show_student_Evaluation');
    });
    
    // Route::get('/students', function () {
        // return view('university_employee/supervisor/students'); })->name('supervisor_list_students');   
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
Route::get('company_employee/register',[RegisterController::class,'create'])->name('company_employee_registeration');
Route::post('company_employee/register/store',[RegisterController::class,'store'])->name('company_employee_store');

Route::prefix('hr/{user_id}')
//->middleware('web', 'hr')
->group(function () {
    Route::get('/company_profile', [HrCompanyProfileController::class, 'index'])->name('hr_company_profile');
    Route::get('/edit_company_profile', [HrCompanyProfileController::class, 'edit'])->name('hr_edit_company_profile');
    Route::post('/edit_company_profile', [HrCompanyProfileController::class, 'update'])->name('hr_update_company_profile');

    Route::prefix('/trainees')->group(function(){
        Route::get('/', [HrListController::class, 'index'])->name('hr_list_trainees');
        Route::get('/university_students',[UniversityStudentsController::class,'index'])->name('hr_university_students');
        Route::get('/add_trainee/{student_id}', [UniversityStudentsController::class, 'add'])->name('hr_add_trainee');
        Route::get('/add-selected-trainees}', [UniversityStudentsController::class, 'addSelectedTrainees'])->name('hr_add_selected_trainees');
        Route::get('/assign_trainings', [AssignTrainingController::class,'index'])->name('hr_manage_trainings');
        Route::post('/assign_training', [AssignTrainingController::class,'add'])->name('hr_assign_training');
        Route::post('/unassign_training', [AssignTrainingController::class,'delete'])->name('hr_unassign_training');
    });

    Route::prefix('/company_employees')->group(function(){
        Route::get('/', [HrCompanyEmployeeController::class,'index'])->name('hr_list_employees');
        Route::get('/create', [HrCompanyEmployeeController::class,'create'])->name('hr_add_employee');
        Route::post('/store', [HrCompanyEmployeeController::class,'store'])->name('hr_store_employee');
        Route::get('/delete/{employee_id}', [HrCompanyEmployeeController::class, 'destroy'])->name('hr_delete_employee');
        Route::get('/update_role/{employee_id}', [HrCompanyEmployeeController::class, 'update_role'])->name('hr_update_role');
    });

    Route::prefix('/trainings')->group(function(){
        Route::get('/', [TrainingController::class, 'index'])->name('hr_list_trainings');
        Route::get('/create', [TrainingController::class,'create'])->name('hr_add_training');
        Route::post('/store', [TrainingController::class,'store'])->name('hr_store_training');
        Route::get('/delete/{training_id}', [TrainingController::class, 'destroy'])->name('hr_delete_training');
    });
});

//students' routes
Route::get('student/register',[StudentRegisterController::class,'create'])->name('student_registeration');
Route::post('student/register/store',[StudentRegisterController::class,'store'])->name('student_registeration_1.store');

Route::prefix('/student/{user_id}')->group(function () {
    Route::get('/profile',[StudentProfileController::class,'show'])->name('student_profile');
    Route::get('/edit_profile',[EditStudentProfileController::class,'show'])->name('edit_student_profile');
    Route::get('/evaluate_company',[EvaluateCompanyController::class,'show'])->name('student_evaluate_company');
    Route::POST('/evaluate_company/add',[EvaluateCompanyController::class,'add'])->name('student_evaluate_company.add');
    Route::get('/list',[StudentRegisterController::class,'test'])->name('test');

})->name('student');


// Route::post('/store',[StudentRegisterController::class,'store'])->name('student_store');

Route::post('store{id}',[StudentRegisterController::class,'addManyLanguageToStudent'])->name('student_store');
// Route::post('/lang-save',[StudentRegisterController::class,'addManyLanguageToStudent'])->name('student_storing_languge');

// Route::get('listSpec{id}',[StudentProfileController::class,'getSpecification'])->name('student_spec_list');


// trainer
Route::prefix('/trainer/{user_id}')->group(function(){
    Route::prefix('/trainees')->group(function(){
        Route::get('/',[TrainerController::class,'show'])->name('trainer_list_traniees');
        Route::prefix('/progress/{trainee_id}')->group(function(){
        Route::get('/',[progressController::class,'show'])->name('fill_traniee_progress');
        Route::POST('/add',[progressController::class,'add'])->name('fill_traniee_progress.add');
        Route::get('/edit/{progress_id}',[progressController::class,'edit'])->name('fill_traniee_progress.edit');
        Route::PUT('/update/{progress_id}',[progressController::class,'update'])->name('fill_traniee_progress.update');
        Route::POST('/delete/{progress_id}',[progressController::class,'destroy'])->name('fill_traniee_progress.delete');
        });
        Route::get('/evaluation/{trainee_id}',[EvaluateController::class,'show'])->name('fill_traniee_evaluation');
        Route::post('/evaluation/add/{trainee_id}',[EvaluateController::class,'add'])->name('fill_traniee_evaluation.add');

        });
});
