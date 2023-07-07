<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class EvaluateCompany extends Model
{
    use HasFactory;
    protected $table ="evaluate_companies";
    protected $hidden = ['created_at','updated_at'];
    protected $fillable = ['skills_you_trained',
    'training_palce_evaluation',
    'pros',
    'cons',
    'new_skills_gained',
    'skills_wish_they_included',
    'skills_wish_were_given_better',
    'recommend_sending_students',
    'recommended_evaluate_sys',
    'recommended_evaluate_sys_explanation',
    'internship_time_before_senior_year',
    'more_than_one_internship',
    'finding_training_difficulties',
    'recommendations',
    'notes_about_website'];

    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
