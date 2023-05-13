<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;

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
}
