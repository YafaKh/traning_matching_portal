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
   
        public function student_spoken_languages():HasManyThrough
    {
        return $this->hasManyThrough(Student::class,Student_spoken_language::class);
    }
}
