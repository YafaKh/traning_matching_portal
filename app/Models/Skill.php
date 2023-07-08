<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use App\Models\Student;

class Skill extends Model
{
    use HasFactory;
      
    protected $table ="skills";
    protected $fillable = ['name'];
    protected $hidden = ['created_at','updated_at'];

    public function students()
    {
        return $this->belongsToMany(Student::class);
    }
}
