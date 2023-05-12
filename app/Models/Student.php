<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;
use App\Models\EvaluateStudent;
use App\Models\EvaluateCompany;
use App\Models\Progress;

class Student extends Model
{
    use HasFactory;
    protected $table ="students";
    protected $fillable = ['student_num',
    'first_arabic_name',
'    first_english_name',
'    second_arabic_name',
'    second_english_name',
'    third_arabic_name',
    'third_english_name',
'    last_arabic_name',
'    last_english_name',
    'gender',
    'passed_hours',
    'gpa',
    'address',
    'email',
    'password',
    'availability_date',
    'connected_with_a_company',
    'connected_company_info',
    'phone',
    'image'];
    protected $hidden = ['created_at','updated_at','pivot'];
    /* public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }*/

    // public function training()
    // {
    //     return $this->belongsTo(Training::class);
    // }

     public function spoken_languages()
    {
        return $this->belongsToMany(Spoken_languages::class,'students_spoken_languages','student_id','spoken_language_id');
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
}
