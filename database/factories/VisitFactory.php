<?php

namespace Database\Factories;
use App\Models\Student;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Visit>
 */
class VisitFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $students_ids = Student::pluck('id')->all();

        return [
            'visit_date' => $this->faker->date(),
            'visit_time' => $this->faker->time(),
            'report' => $this->faker->text,
            'contact_way' => $this->faker->boolean(),
            'student_id' =>  $this->faker->randomElement($students_ids),
        ];
    }
}
