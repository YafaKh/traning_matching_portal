<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
}
