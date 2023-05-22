<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_skill extends Model
{
    use HasFactory;
    protected $table ="students_skills";
    protected $fillable = ['level','student_id','skill_id'];
    protected $hidden = ['created_at','updated_at'];

}
