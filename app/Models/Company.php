<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\CompanyEmployee;
use App\Models\Training;



class Company extends Model
{
    use HasFactory;
    use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

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
