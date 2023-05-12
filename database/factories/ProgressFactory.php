<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Student;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Progress>
 */
class ProgressFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $students_ids = Student::pluck('id')->all();
        return [
            'week' => $faker->numberBetween(1, 52),
            'end_date' => $faker->date(),
            'passed_hours' => $faker->numberBetween(0, 40),
            'absences_days' => $faker->numberBetween(0, 5),
            'note' => $faker->sentence,
            'student_id' => $this->faker->randomElement($students_ids),
        ];
    }
}
