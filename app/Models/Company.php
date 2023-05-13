<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\CompanyEmployee;
use App\Models\Training;
use App\Models\CompanyBranch;

class Company extends Model
{
    use HasFactory;
    //use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $fillable = [
        'name',
        'Industry',
        'description',
        'website',
        'linkedin',
        'image',
    ];

    public function branches()
    {
        return $this->hasMany(CompanyBranch::class);
    }

    public function employees()
    {
        return $this->hasMany(CompanyEmployee::class);
    }

    public function trainings(): HasManyThrough
    {
        return $this->hasManyThrough(Training::class, CompanyEmployee::class);
    }
    /*public function students()//trainees
    {
        return $this->hasManyDeep(Student::class, [CompanyEmployee::class, Training::class]);
    }*/
}
