<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Company>
 */
class CompanyFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name' => $this->faker->company,
            'Industry' => $this->faker->text(10),
            'description' => $this->faker->text(200),
            'website' => $this->faker->url(12),
            'linkedin' => $this->faker->url,
            'image' => $this->faker->imageUrl(),
        ];
    }
}
