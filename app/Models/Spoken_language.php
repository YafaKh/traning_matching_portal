<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;


class Spoken_language extends Model 
{
    use HasFactory;
    
    protected $table ="spoken_languages";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
   
    // public function students()
    // {
        // return $this->belongsToMany('App\Models\Student','students_spoken_languages','spoken_language_id','student_id')
        // ->withPivot(['speaking_level','writing_level','listening_level']);
    // }
        public function student_spoken_languages():HasManyThrough
    {
        return $this->hasManyThrough(Student::class,Student_spoken_language::class);
    }
}
