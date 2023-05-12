<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvaluateStudent>
 */
class EvaluateStudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_weaknesses' => $this->faker->paragraph,
            'willing_to_hire' => $this->faker->boolean,
            'willing_to_hire_reason' => $this->faker->paragraph,
            'comments' => $this->faker->text(200),
            'fulfilling_required_tasks' => $this->faker->numberBetween(1, 10),
            'teamwork_ability' => $this->faker->numberBetween(1, 10),
            'punctuality' => $this->faker->numberBetween(1, 10),
            'quality_of_work' => $this->faker->numberBetween(1, 10),
            'dependability' => $this->faker->numberBetween(1, 10),
            'initiative' => $this->faker->numberBetween(1, 10),
            'general_appearance' => $this->faker->numberBetween(1, 10),
            'ability_to_judge' => $this->faker->numberBetween(1, 10),
            'enthusiasm' => $this->faker->numberBetween(1, 10),
            'communicational_skills' => $this->faker->numberBetween(1, 10),
            'english_language_proficiency' => $this->faker->numberBetween(1, 10),
        ];
    }
}
