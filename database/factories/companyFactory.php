<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\company>
 */
class companyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'Industry' => $this->faker->jobTitle,
            'description' => $this->faker->text(200),
            'website' => $this->faker->url,
            'linkedin' => $this->faker->url,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
