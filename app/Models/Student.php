<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    use HasFactory;

    protected $table ="students";
    protected $fillable = ['student_num',
    'gender',
    'passed_hours',
    'gpa',
    'address',
    'email',
    'password',
    'availability_date',
    'connected_with_a_company',
    'connected_company_info',
    'phone_no',
    'image'];
    protected $hidden = ['created_at','updated_at'];

}
