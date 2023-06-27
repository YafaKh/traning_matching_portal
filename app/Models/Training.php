<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyEmployee;
use App\Models\Student;
use App\Models\CompanyBranch;
use App\Models\TrainingField;

class Training extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'semester',
        'year',
        'training_field_id',
        'details',
        'company_employee_id',
        'company_branch_id',
    ];
   /* public function scopeDefaultOrder($query)
    {
        return $query->orderByRaw("CONCAT(year, semester) DESC");
    }*/
    public function employee()
    {
        return $this->belongsTo(CompanyEmployee::class, 'company_employee_id');
    }

    public function branch()
    {
        return $this->belongsTo(CompanyBranch::class, 'company_branch_id');
    }

    public function students()
    {
        return $this->hasMany(Student::class, 'training_id');
    }

    public function training_field()
    {
        return $this->belongsTo(TrainingField::class);
    }
}
