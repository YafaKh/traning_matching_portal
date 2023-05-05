<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyEmployee;

class CompanyRole extends Model
{
    use HasFactory;
    protected $fillable = ['hr', 'trainer'];

    public function employees()
    {
        return $this->hasMany(CompanyEmployee::class);
    }
}
