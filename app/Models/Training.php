<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

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
        return $this->belongsTo(CompanyBranchDepartment::class, 'branch_department_id');
    }
}
