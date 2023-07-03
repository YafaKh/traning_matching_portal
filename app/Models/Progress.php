<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Student;

class Progress extends Model
{
    use HasFactory;
    protected $table ="progresses";
    protected $fillable = ['week','end_date','passed_hours','absences_days','note','student_id'];
    protected $hidden = ['created_at','updated_at'];

    public function Student()
    {
        return $this->belongsTo(Student::class);
    }
}
