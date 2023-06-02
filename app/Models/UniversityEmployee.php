<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\University;
use App\Models\UniversityEmployeeRole;

class UniversityEmployee extends Model
{
    use HasFactory;
    protected $fillable = [
        'employee_num',
        'email',
        'phone',
        'password',
        'first_name',
        'second_name',
        'third_name',
        'last_name',
        'image',
        'university_id',
        'university_employee_role_id',
    ];

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }

    public function roles()
    {
        return $this->belongsTo(UniversityEmployeeRole::class, 'university_employee_role_id');
    }
}
