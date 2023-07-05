<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Visit extends Model
{
    use HasFactory;
    protected $fillable = ['visit_date','visit_time','report','contact_way','student_id'];

    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
