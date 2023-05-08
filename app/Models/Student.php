<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $fillable = [
        'student_num',
        'first_arabic_name',
        'first_english_name',
        'second_arabic_name',
        'second_english_name',
        'third_arabic_name',
        'third_english_name',
        'last_arabic_name',
        'last_english_name',
        'gender',
        'passed_hours',
        'gpa',
        'address',
        'email',
        'password',
        'availability_date',
        'connected_with_a_company',
        'connected_company_info',
        'phone',
        'registered',
        'image',
        'university_id',
        'specialization_id',
        'training_id',
    ];

    public function university()
    {
        return $this->belongsTo(University::class);
    }

    public function specialization()
    {
        return $this->belongsTo(Specialization::class);
    }

    public function training()
    {
        return $this->belongsTo(Training::class);
    }
}
