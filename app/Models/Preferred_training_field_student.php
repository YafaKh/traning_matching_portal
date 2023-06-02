<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferred_training_field_student extends Model
{
    use HasFactory;
    protected $table ="preferred_training_fields_students";
    protected $fillable = ['student_id','preferred_training_id'];
    protected $hidden = ['created_at','updated_at'];
   
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function preferredTrainingField()
    {
        return $this->belongsTo(Preferred_training_field::class);
    }
}
