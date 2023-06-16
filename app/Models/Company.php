<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmail;
use App\Models\CompanyPhone;
use App\Models\Training;
use App\Models\CompanyBranch;
use App\Models\StudentCompanyApproval;
class Company extends Model
{
    use HasFactory;
    //use \Staudenmeir\EloquentHasManyDeep\HasRelationships;

    protected $fillable = [
        'name',
        'industry',
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

    public function emails()
    {
        return $this->hasMany(CompanyEmail::class);
    }

    public function phones()
    {
        return $this->hasMany(CompanyPhone::class);
    }

    public function trainings(): HasManyThrough
    {
        return $this->hasManyThrough(Training::class, CompanyBranch::class); 
    }
    /*public function students()//trainees
    {
        return $this->hasManyDeep(Student::class, [CompanyEmployee::class, Training::class]);
    }*/
    public function not_approved_students()
    {
        return $this->hasMany(StudentCompanyApproval::class , 'company_id');
    }
}
