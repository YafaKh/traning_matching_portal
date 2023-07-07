<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Student;
use App\Models\University;
use App\Models\UniversityEmployeeRole;

class UniversityEmployee extends Authenticatable
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
        'active'
    ];
    public function scopeDefaultOrder($query)
    {
        return $query->orderBy('first_name');
    }

    public function university()
    {
        return $this->belongsTo(University::class, 'university_id');
    }
    public function students()
    {
        return $this->hasMany(Student::class);
    }
    public function roles()
    {
        return $this->belongsTo(UniversityEmployeeRole::class, 'university_employee_role_id');
    }
}
