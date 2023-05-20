<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spoken_language extends Model 
{
    use HasFactory;
    
    protected $table ="spoken_languages";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
   
    public function students()
    {
        return $this->belongsToMany('App\Models\Student','students_spoken_languages','spoken_language_id','student_id')
        ->withPivot(['speaking_level','writing_level','listening_level']);
    }
}
