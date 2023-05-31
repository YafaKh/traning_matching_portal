<?php

namespace App\Models;
use App\Models\Company;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CompanyPhone extends Model
{
    use HasFactory;

    protected $fillable = [
        'phone_no',	
        'company_id',
    ];

    public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
