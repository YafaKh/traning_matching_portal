<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Progress extends Model
{
    use HasFactory;
    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
