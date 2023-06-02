<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preferred_cities_student extends Model
{
    use HasFactory;
    protected $table ="preferred_cities_students";
    protected $fillable = ['student_id','city_id'];
    protected $hidden = ['created_at','updated_at'];
   
    public function student()
    {
        return $this->belongsTo(Student::class);
    }

    public function city()
    {
        return $this->belongsTo(City::class);
    }
    

}
