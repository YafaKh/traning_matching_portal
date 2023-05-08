<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->word,
            'semester' => $this->faker->numberBetween(1, 4),
            'training_feild' => $this->faker->word,
            'details' => $this->faker->text,
            'company_employee_id' => CompanyEmployee::factory()->create()->id,
            'branch_department_id' => CompanyBranchDepartment::factory()->create()->id
        ];
    }
}
