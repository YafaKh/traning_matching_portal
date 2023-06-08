<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Training;

class TrainingFeild extends Model
{
    use HasFactory;
    public function trainings()
    {
        return $this->hasMany(Training::class, 'training_field_id');
    }
}
