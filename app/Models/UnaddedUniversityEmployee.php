<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\University;
use App\Models\UniversityEmployeeRole;

class UnaddedUniversityEmployee extends Model
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
    ];
    public function scopeDefaultOrder($query)
    {
        return $query->orderBy('first_name');
    }
}
