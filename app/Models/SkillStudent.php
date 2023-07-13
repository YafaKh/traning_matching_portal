<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class StudentSkill extends Model
{
    use HasFactory;
    protected $table ="skill_student";

    protected $fillable = ['skill_id',
    'student_id'];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function skill()
    {
        return $this->belongsToMany(ٍSkill::class, 'skill_id');
    }

}
