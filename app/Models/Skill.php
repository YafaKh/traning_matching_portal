<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;

class Skill extends Model
{
    use HasFactory;
      
    protected $table ="skills";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
   
    // public function students()
    // {
    //     return $this->belongsToMany('App\Models\Student','students_skills','skill_id','student_id');
    //     // ->withPivot(['level']);
    // }
    public function student_skill():HasManyThrough
    {
        return $this->hasManyThrough(Student::class,Student_skill::class);
    }
}
