<?php

namespace Database\Factories;
use App\Models\PreferredTrainingField;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PreferredTrainingField>
 */
class PreferredTrainingFieldFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'name'=> $this->faker->unique()->sentence(),

        ];
    }
}
