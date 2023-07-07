<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class PreferredCompany extends Model
{
    use HasFactory;
    protected $fillable = ['name'];

    public function students()
    {
        return $this->belongsToMany(Student::class, 'preferred_companies_students', 'preferred_company_id', 'student_id');
    }
}
