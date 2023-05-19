<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UnaddedCompanyEmployee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'second_name', 'third_name', 'last_name',
                          'phone','email', 'company_id', 'password', 'img'];
}
