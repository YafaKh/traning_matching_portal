<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Specialization extends Model
{
    use HasFactory;
    protected $table ="specializations";
    protected $fillable = ['name','university_id'];
    protected $hidden = ['created_at','updated_at'];
   
    public function students()
    {
        return $this->hasMany('App\Models\Student','specialization_id');
    }
    

}
