<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyEmployee;
use App\Models\Student;
use App\Models\CompanyDepartment;
use App\Models\CompanyBranch;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'semester',
        'training_field',
        'details',
        'company_employee_id',
        'branch_department_id',
    ];
    public function employee()
    {
        return $this->belongsTo(CompanyEmployee::class, 'company_employee_id');
    }

    public function department()
    {
        return $this->belongsTo(CompanyDepartment::class, 'department_id');
    }
    
    public function branch()
    {
        return $this->belongsTo(CompanyBranch::class, 'branch_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class);
    }
}
