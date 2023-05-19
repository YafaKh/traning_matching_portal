<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;
use App\Models\Company;

class CompanyBranch extends Model
{
    use HasFactory;
    protected $fillable = [
        'address',
    ];
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
