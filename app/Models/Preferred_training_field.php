<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferred_training_field extends Model
{
    use HasFactory;
    protected $table ="preferred_training_fields";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
   
    // public function students()
    // {
    //     return $this->belongsToMany('App\Models\Student','preferred_training_fields_students','preferred_training_id','student_id');
    // }
    public function studentPreferredTrainingField():HasManyThrough
    {
        return $this->hasManyThrough(Preferred_training_field_student::class,Student::class);
    }
    
}
