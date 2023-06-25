<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

use Illuminate\Database\Eloquent\Relations\HasManyThrough;
use Illuminate\Database\Eloquent\Model;
use App\Models\Company;
use App\Models\CompanyRole;
use App\Models\Student;
use App\Models\Training;


class CompanyEmployee  extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;
    protected $fillable = ['first_name', 'second_name', 'third_name', 'last_name',
    'phone','email', 'company_id', 'img', 'password', 'company_employee_role_id',
    'contactable', 'active'];
     /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

        /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    
    public function scopeDefaultOrder($query)
    {
        return $query->orderBy('first_name');
    }
    public function scopeOrderByCompany($query)
    {
        return $query->orderBy('company_id');
    }
    public function company()
    {
        return $this->belongsTo(Company::class);
    }
    public function roles()
    {
        return $this->belongsTo(CompanyRole::class);
    }
    public function trainings()
    {
        return $this->hasMany(Training::class);
    }
    public function students(): HasManyThrough
    {
        return $this->hasManyThrough(Student::class, Training::class);
    }
}
