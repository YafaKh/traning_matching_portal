<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class EvaluateCompany extends Model
{
    use HasFactory;
    protected $fillable = ['training_palce_evaluation', 'pros','cons'];

    
    public function student()
    {
        return $this->belongsTo(Student::class);
    }
}
