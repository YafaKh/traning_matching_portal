<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\PreferredCity;

class City extends Model
{
    use HasFactory;
    protected $table ="cities";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];
   
    public function studentPreferredCity()
    {
        return $this->hasMany(PreferredCity::class);
    }
    public function companies()
    {
        return $this->hasMany(Company::class);
    }
    public function students()
    {
        return $this->hasMany('App\Models\Student','city_id');
    }
}
