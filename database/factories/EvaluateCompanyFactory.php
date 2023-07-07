<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\EvaluateCompany>
 */
class EvaluateCompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return[
        'skills_you_trained'=> $this->faker->paragraph,
        'training_palce_evaluation' => $this->faker->numberBetween(1, 10),
        'pros' => $this->faker->paragraph,
        'cons' => $this->faker->paragraph,
        'new_skills_gained' => $this->faker->paragraph,
        'skills_wish_they_included' => $this->faker->paragraph,
        'skills_wish_were_given_better' => $this->faker->paragraph,
        'recommend_sending_students' => $this->faker->boolean,
        'recommended_evaluate_sys' => $this->faker->randomElement(['numbers', 'letters']),
        'recommended_evaluate_sys_explanation' => $this->faker->paragraph,
        'internship_time_before_senior_year' => $this->faker->boolean,
        'more_than_one_internship' => $this->faker->boolean,
        'finding_training_difficulties' => $this->faker->paragraph,
        'recommendations' => $this->faker->paragraph,
        'notes_about_website' => $this->faker->paragraph,
      ];
    }
}
