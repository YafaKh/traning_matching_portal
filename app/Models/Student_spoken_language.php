<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student_spoken_language extends Model
{
    use HasFactory;

    protected $table ="students_spoken_languages";
    protected $fillable = ['speaking_level','writing_level','listening_level','student_id','spoken_language_id'];
    protected $hidden = ['created_at','updated_at'];
   
}
