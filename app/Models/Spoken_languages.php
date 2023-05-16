<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Spoken_languages extends Model
{
    use HasFactory;
    
    protected $table ="spoken_languages";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
   
    public function students()
    {
        return $this->belongsToMany(Student::class,'students_spoken_languages','spoken_language_id','student_id');
    }
}
