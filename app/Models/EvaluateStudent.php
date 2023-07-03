<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class EvaluateStudent extends Model
{
    use HasFactory;
    protected $table ="evaluate_students";

    protected $fillable = ['student_weaknesses',
    'willing_to_hire',
    'willing_to_hire_reason',
    'comments',
    'fulfilling_required_tasks',
    'teamwork_ability',
    'punctuality',
    'quality_of_work',
    'dependability',
    'initiative',
    'general_appearance',
    'ability_to_judge',
    'enthusiasm',
    'communicational_skills',
    'english_language_proficiency',
    'sum'];
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
  
}
