<?php

namespace Database\Factories;
use App\Models\EvaluateStudent;
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
    protected $model = EvaluateStudent::class;

    public function definition()
    {
        return [
            'student_weaknesses' => $this->faker->paragraph,
            'willing_to_hire' => $this->faker->boolean,
            'willing_to_hire_reason' => $this->faker->paragraph,
            'comments' => $this->faker->text(200),
            'attendance'=> $this->faker->numberBetween(0, 5),
            'fulfilling_required_tasks' => $this->faker->numberBetween(0, 5),
            'teamwork_ability' => $this->faker->numberBetween(0, 5),
            'punctuality' => $this->faker->numberBetween(0, 5),
            'quality_of_work' => $this->faker->numberBetween(0, 5),
            'dependability' => $this->faker->numberBetween(0, 5),
            'initiative' => $this->faker->numberBetween(0, 5),
            'general_appearance' => $this->faker->numberBetween(0, 5),
            'ability_to_judge' => $this->faker->numberBetween(0, 5),
            'enthusiasm' => $this->faker->numberBetween(0, 5),
            'communicational_skills' => $this->faker->numberBetween(0, 5),
            'english_language_proficiency' => $this->faker->numberBetween(0, 5),
            'avg' =>$this->faker->numberBetween(0,100),
        ];
    }
}
