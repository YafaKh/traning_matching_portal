<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\Preferred_cities_student;

class City extends Model
{
    use HasFactory;
    protected $table ="cities";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
   
    public function studentPreferredCity()
    {
        return $this->hasMany(Preferred_cities_student::class);
    }
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
}
