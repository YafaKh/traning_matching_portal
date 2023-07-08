<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;


class PreferredTrainingField extends Model
{
    use HasFactory;
    protected $table ="preferred_training_fields";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
   
    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
    

}
