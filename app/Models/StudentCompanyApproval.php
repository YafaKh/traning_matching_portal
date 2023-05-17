<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;
use App\Models\company;

class StudentCompanyApproval extends Model
{
    use HasFactory;
    protected $fillable = ['company_id',
    'student_id',];
    public function student()
    {
        return $this->belongsTo(Student::class, 'student_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class, 'company_id');
    }
}
