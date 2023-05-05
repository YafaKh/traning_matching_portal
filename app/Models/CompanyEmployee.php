<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\CompanyRole;


class CompanyEmployee extends Model
{
    use HasFactory;
    protected $fillable = ['first_name', 'second_name', 'third_name', 'last_name',
                          'phone','email', 'company_id','', '	password'];
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function roles()
    {
        return $this->belongsTo(CompanyRole::class);
    }
}
