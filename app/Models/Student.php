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
    'phone_no',
    'image'];
    protected $hidden = ['created_at','updated_at'];
    /* public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }*/

    public function training()
    {
        return $this->belongsTo(Training::class);
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
