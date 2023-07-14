<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Controller;

use App\Http\Controllers\AllUsers\UserTypeController;
use App\Http\Controllers\AllUsers\LoginController;
use App\Http\Controllers\AllUsers\LogoutController;

use App\Http\Controllers\Student\StudentProfileController;
use App\Http\Controllers\Student\EditStudentProfileController;
use App\Http\Controllers\Student\StudentRegisterController;
use App\Http\Controllers\Student\EvaluateCompanyController;
use App\Http\Controllers\Student\ProgressController as StuProgressController;

use App\Http\Controllers\CompanyEmployee\RegisterController as CompanyRegisterController;
use App\Http\Controllers\CompanyEmployee\HR\Trainees\ListController as HrListController;
use App\Http\Controllers\CompanyEmployee\HR\Trainees\UniversityStudentsController;
use App\Http\Controllers\CompanyEmployee\HR\Trainees\AssignTrainingController;
use App\Http\Controllers\CompanyEmployee\HR\CompanyEmployeeController as HrCompanyEmployeeController;
use App\Http\Controllers\CompanyEmployee\HR\TrainingController;
use App\Http\Controllers\CompanyEmployee\Trainer\TrainerController;
use App\Http\Controllers\CompanyEmployee\Trainer\ProgressController;
use App\Http\Controllers\CompanyEmployee\Trainer\EvaluateController;
use App\Http\Controllers\CompanyEmployee\HR\CompanyProfileController as HrCompanyProfileController;

use App\Http\Controllers\UniversityEmployee\RegisterController as UniversityRegisterController;
use App\Http\Controllers\UniversityEmployee\Coordinator\Students\ListController as CooListController;
use App\Http\Controllers\UniversityEmployee\Coordinator\Students\StudentCompanyApprovalController;
use App\Http\Controllers\UniversityEmployee\Coordinator\Students\AssignSupervisorsController;
use App\Http\Controllers\UniversityEmployee\Coordinator\UniversityEmployeeController as CooUniversityEmployeeController;
use App\Http\Controllers\UniversityEmployee\Coordinator\CompaniesController as CooCompaniesController;
use App\Http\Controllers\UniversityEmployee\Supervisor\StudentsController;
use App\Http\Controllers\UniversityEmployee\Supervisor\VisitsController;
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
Route::get('/logout/{user_type}', [LogoutController::class, 'logout'])->name('logout');

Route::get('/forgot-password', function () {
    return view('auth.forgot-password');
})->middleware('guest')->name('password.request');
;
Route::get('/reset_password', function () {
    return view('/all_users/reset_password');
})->name('reset_password'); 

// admin 
Route::prefix('/admin')
//->middleware('web', 'admin')
->group(function () {
    Route::get('/companies',[AdminCompaniesController::class,'index'])->name('admin_companies');
    Route::get('/company{company_id}_profile', [AdminCompaniesController::class, 'show_company_profile'])->name('admin_company_profile');
    Route::get('/comapnies_want_to_join',[CompaniesWantJoinController::class,'index'])->name('admin_compnies_want_to_join');
    Route::get('/accept_company{company_id}',[CompaniesWantJoinController::class,'accept'])->name('admin_accept_company');
    Route::get('/reject_company{company_id}',[CompaniesWantJoinController::class,'reject'])->name('admin_reject_company');
    Route::get('/companies_employees',[AdCompanyEmployeeController::class,'index'])->name('admin_companies_employees');
    Route::prefix('/university_employees')->group(function(){
        Route::get('/',[AdUniversityEmployeeController::class,'index'])->name('admin_university_employees');
        Route::get('/add', [AdUniversityEmployeeController::class,'add'])->name('admin_add_university_employee');
        Route::post('/store', [AdUniversityEmployeeController::class,'store'])->name('admin_store_university_employee');
    });
    Route::get('/students',[StudentController::class,'index'])->name('admin_students');
});

// university employees' routes

Route::get('university_employee/register',[UniversityRegisterController::class,'create'])->name('university_employee_registeration');
Route::post('university_employee/register/store',[UniversityRegisterController::class,'store'])->name('university_employee_store');    

Route::prefix('/coordinator/{user_id}')
//->middleware('web', 'university_employee')
->group(function(){
    Route::prefix('/students')->group(function(){
        Route::get('/', [CooListController::class,'index'])->name('coordinator_list_students');
        Route::get('/filter-students', [CooListController::class, 'filterStudents'])->name('filtered_students.coordinator');
        Route::get('/search', [CooListController::class, 'search'])->name('search.coordinator');
        Route::post('/update_register_list', [CooListController::class,'update_register_list'])->name('update_register_list');
        Route::get('/destroy/{student_id}', [CooListController::class,'destroy'])->name('coordinator_delete_student');
        Route::get('/delete-selected-students', [CooListController::class, 'deleteSelectedStudents'])->name('delete_selected_students');
        Route::get('/students_companies_approval', [StudentCompanyApprovalController::class, 'index'])->name('coordinator_students_companies_approval');
        Route::get('/student_company_approve/{not_approved_student_company}', [StudentCompanyApprovalController::class, 'approve'])->name('coordinator_student_company_approve');
        Route::get('/assign_supervisors', [AssignSupervisorsController::class, 'index'])->name('coordinator_manage_supervisors');
        Route::post('/assign_supervisor', [AssignSupervisorsController::class,'add'])->name('coordinator_assign_supervisor');
        Route::get('/unassign_supervisor/{student_id}', [AssignSupervisorsController::class,'delete'])->name('coordinator_unassign_supervisor');
     });
     Route::get('/student{student_id}_profile', [CooListController::class, 'show_student_profile'])->name('coordinator_student_profile');
     Route::get('/progress/{student_id}', [CooListController::class, 'showProgressPage'])->name('coordinator_student_progress');
     Route::get('/student_Evaluation/{student_id}', [CooListController::class, 'show_student_evaluation'])->name('coordinator_student_Evaluation');
     Route::get('/company_Evaluation/{student_id}', [CooListController::class, 'show_company_evaluation'])->name('coordinator_company_Evaluation');

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

Route::prefix('/supervisor/{user_id}')
//->middleware('web', 'university_employee')
->group(function(){
    Route::prefix('/students')->group(function(){
    Route::get('/', [StudentsController::class, 'index'])->name('supervisor_list_students');
    Route::get('/progress/{student_id}', [StudentsController::class, 'showProgressPage'])->name('supervisor_student_progress');
    Route::get('/student_evaluation/{student_id}', [StudentsController::class, 'showEvaluateStudentPage'])->name('show_student_Evaluation');
    Route::get('/company_evaluation/{student_id}', [StudentsController::class, 'showEvaluateCompnyPage'])->name('show_company_Evaluation');
    Route::get('/filter-students', [StudentsController::class, 'filterStudents'])->name('filtered_students');
    Route::get('/search', [StudentsController::class, 'search'])->name('search');


    Route::get('/student_profile/{student_id}', [StudentsController::class, 'show_student_profile'])->name('supervisor_student_profile');
}); 
    Route::prefix('/visits')->group(function(){
        Route::get('/student{student_id}', [VisitsController::class, 'index'])->name('student_visits');
        Route::get('/create{student_id}', [VisitsController::class, 'create'])->name('fill_visit_form');
        Route::post('/store{student_id}', [VisitsController::class, 'store'])->name('store_visit');
        Route::get('/edit{student_id}/{visit_id}',[VisitsController::class,'edit'])->name('edit_visit');
        Route::PUT('/update{student_id}/{visit_id}',[VisitsController::class,'update'])->name('update_visit');
    });
});   

// company employees' routes
Route::get('company_employee/register',[CompanyRegisterController::class,'create'])->name('company_employee_registeration');
Route::post('company_employee/register/store',[CompanyRegisterController::class,'store'])->name('company_employee_store');

Route::prefix('hr/{user_id}')
//->middleware('web', 'company_employee')
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
    Route::get('/student{student_id}_profile', [HrListController::class, 'show_student_profile'])->name('hr_student_profile');
    Route::get('/progress/{student_id}', [HrListController::class, 'showProgressPage'])->name('hr_student_progress');
    Route::get('/stusent_evaluation/{student_id}', [HrListController::class, 'show_student_evaluation'])->name('hr_student_evaluation');

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

// trainer
Route::prefix('/trainer/{user_id}')
//->middleware('web', 'company_employee')
->group(function(){
    Route::prefix('/trainees')->group(function(){
        Route::get('/',[TrainerController::class,'show'])->name('trainer_list_traniees');
        Route::prefix('/progress/{trainee_id}')->group(function(){
        Route::get('/',[ProgressController::class,'show'])->name('fill_traniee_progress');
        Route::POST('/add',[ProgressController::class,'add'])->name('fill_traniee_progress.add');
        Route::get('/edit/{progress_id}',[ProgressController::class,'edit'])->name('fill_traniee_progress.edit');
        Route::PUT('/update/{progress_id}',[ProgressController::class,'update'])->name('fill_traniee_progress.update');
        Route::get('/delete/{progress_id}',[ProgressController::class,'destroy'])->name('fill_traniee_progress.delete');
        });
        Route::get('/student{student_id}_profile', [TrainerController::class, 'show_student_profile'])->name('trainer_student_profile');
        Route::get('/evaluation/{trainee_id}',[EvaluateController::class,'create'])->name('fill_traniee_evaluation');
        Route::post('/evaluation/store/{trainee_id}',[EvaluateController::class,'store'])->name('store_traniee_evaluation');
        Route::get('/show_evaluation/{trainee_id}',[EvaluateController::class,'show'])->name('show_traniee_evaluation');

        });
});


//students' routes
Route::get('student/register',[StudentRegisterController::class,'create'])->name('student_registeration');
Route::post('student/register/store',[StudentRegisterController::class,'store'])->name('student_registeration.store');

Route::prefix('/student/{user_id}')
//->middleware('web', 'student')
->group(function () {
    Route::get('/profile',[StudentProfileController::class,'show'])->name('student_profile');
    Route::get('/edit_profile',[EditStudentProfileController::class,'show'])->name('edit_student_profile');
    Route::post('/edit_profile/update', [EditStudentProfileController::class, 'update'])->name('update_student_profile');

    Route::get('/progress', [StuProgressController::class, 'showProgressPage'])->name('student_show_progress');
    Route::get('/evaluate_company',[EvaluateCompanyController::class,'show'])->name('student_evaluate_company');
    Route::POST('/evaluate_company/add',[EvaluateCompanyController::class,'add'])->name('student_evaluate_company.add');
    Route::get('/show_company_evaluation', [EvaluateCompanyController::class, 'show_company_evaluation'])->name('student_show_evaluate_company');
    Route::get('/list',[StudentRegisterController::class,'test'])->name('test');
    Route::get('/company_profile/{company_id}', [EvaluateCompanyController::class, 'companyprofile'])->name('company_profile');
    Route::get('/no-company', function () {
        return "You do not have a company yet.";
    })->name('no_company');    
})->name('student');


// Route::post('/store',[StudentRegisterController::class,'store'])->name('student_store');

Route::post('store{id}',[StudentRegisterController::class,'addManyLanguageToStudent'])->name('student_store');
// Route::post('/lang-save',[StudentRegisterController::class,'addManyLanguageToStudent'])->name('student_storing_languge');

// Route::get('listSpec{id}',[StudentProfileController::class,'getSpecification'])->name('student_spec_list');