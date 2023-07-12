<?php

namespace App\Models;
use KyslikColumnSortableSortable;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Training;
use App\Models\EvaluateStudent;
use App\Models\EvaluateCompany;
use App\Models\Progress;
use App\Models\Visit;
use App\Models\Skill;
use App\Models\University;
use App\Models\City;
use App\Models\StudentCompanyApproval;
use App\Models\UniversityEmployee;
use App\Models\PreferredTrainingField;
use App\Models\PreferredCompany;

class Student extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $table ="students";
    protected $fillable = ['student_num',
    'first_name_ar',
    'first_name_en',
    'second_name_ar',
    'second_name_en',
    'third_name_ar',
    'third_name_en',
    'last_name_ar',
    'last_name_en',
    'gender',
    'passed_hours',
    'gpa',
    'load',
    'email',
    'linkedin',
    'password',
    'english_level',
    'availability_date',
    'connected_with_a_company',
    'phone',
    'image',
    'work_experience',
    'university_id',
    'university_employee_id',
    'specialization_id',
    'training_id', 
    'evaluate_student_id',
    'evaluate_company_id',
    'city_id', 
    'active'];
    protected $hidden = ['created_at','updated_at'];
    public $sortable = ['student_num',
    'first_name_ar',
    'first_name_en',
    'second_name_ar',
    'second_name_en',
    'third_name_ar',
    'third_name_en',
    'last_name_ar',
    'last_name_en',
    'student_num',
   ];
    public function scopeDefaultOrder($query)
    {
        return $query->orderBy('first_name_en');
    }

    public function skills()
    {
        return $this->belongsToMany(Skill::class);
    }
    public function preferredTrainingFields()
    {
        return $this->belongsToMany(PreferredTrainingField::class, 'preferred_training_field_student', 'student_id', 'preferred_field_id');
    }
    public function cities()
    {
        return $this->belongsToMany(City::class, 'preferred_city_student');
    }
    public function preferredCompanies()
    {
        return $this->belongsToMany(PreferredCompany::class);
    }

    //one to many
    public function specialization()
    {
        return $this->belongsTo('App\Models\Specialization','specialization_id');
    }    
    public function evaluate_student()
    {
        return $this->belongsTo(EvaluateStudent::class,'evaluate_student_id');
    }
    public function evaluate_company()
    {
        return $this->belongsTo(EvaluateCompany::class);
    }
    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }
    public function visits()
    {
        return $this->hasMany(Visit::class);
    }
    public function not_approved_companies()
    {
        return $this->hasMany(StudentCompanyApproval::class, 'student_id');
    }
    public function university()
    {
        return $this->belongsTo(University::class);
    }
    public function training()
    {
        return $this->belongsTo(Training::class, 'training_id');
    }
    public function employee()
    {
        return $this->belongsTo(UniversityEmployee::class, 'university_employee_id');
    }
    public function city()//student city
    {
        return $this->belongsTo(City::class, 'city_id');
    }
}
