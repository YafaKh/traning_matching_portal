<?php

namespace Database\Factories;
use App\Models\Preferred_training_field_student;
use App\Models\Preferred_training_field;
use App\Models\Stduent;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preferred_training_field_student>
 */
class Preferred_training_field_studentFactory extends Factory
{    protected $model = Preferred_training_field_student::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {

        $studentIds = Student::pluck('id')->all();
        $preferred_training_id = Preferred_training_field::pluck('id')->all();
        return [
            'student_id' => $this->faker->randomElement($studentIds),
            'preferred_training_id' => $this->faker->randomElement($preferred_training_id),
        ];
    }
}
