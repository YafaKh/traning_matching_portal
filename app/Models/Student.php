<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;
use App\Models\EvaluateStudent;
use App\Models\EvaluateCompany;
use App\Models\Progress;

use App\Models\University;
use App\Models\Specialization;
use App\Models\StudentCompanyApproval;

// use App\Models\Spoken_language;


class Student extends Model
{
    use HasFactory;
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
    'address',
    'email',
    'password',
    'availability_date',
    'connected_with_a_company',
    'connected_company_info',
    'phone',
    'image',
    'university_id',
    'specialization_id',
    'training_id'];
    protected $hidden = ['created_at','updated_at'];
    public function university()
    {
        return $this->belongsTo(University::class);
    }

    // public function training()
    // {
    //     return $this->belongsTo(Training::class);
    // }

    //many to many
     public function spoken_languages()
    {
        return $this->belongsToMany('App\Models\Spoken_language','students_spoken_languages','student_id','spoken_language_id'); //'pivot','fk:for this table','fk:for other table'
    }
    public function skills()
    {
        return $this->belongsToMany('App\Models\Skill','students_skills','student_id','skill_id');
    }
    public function preferred_training_fields()
    {
        return $this->belongsToMany('App\Models\Preferred_training_field','preferred_training_fields_students','student_id','preferred_training_id');
    }

    //one to many
    public function specializations()
    {
        return $this->belongsTo('App\Models\Specialization','specialization_id');
    }
   

    public function evaluate_student()
    {
        return $this->hasOne(EvaluateStudent::class);
    }
    public function evaluate_company()
    {
        return $this->hasOne(EvaluateCompany::class);
    }
    public function progresses()
    {
        return $this->hasMany(Progress::class);
    }
    public function not_approved_companies()
    {
        return $this->hasMany(StudentCompanyApproval::class, 'student_id');
    }
}
