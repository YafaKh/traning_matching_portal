<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\CompanyRole;
use App\Models\Student;
use App\Models\Training;


class CompanyEmployee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'second_name', 'third_name', 'last_name',
                          'phone','email', 'company_id', 'img', 'password', 'company_employee_role_id'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function roles()
    {
        return $this->belongsTo(CompanyRole::class);
    }
    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(Student::class, Training::class);
    }
}
