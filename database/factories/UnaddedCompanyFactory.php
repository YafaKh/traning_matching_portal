<?php

namespace Database\Factories;
use Illuminate\Support\Str;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnaddedCompany>
 */
class UnaddedCompanyFactory extends Factory
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
            'website' => $this->faker->url(12),
            'linkedin' => $this->faker->url,
            'email' => $this->faker->unique()->safeEmail,
            'phone' => Str::substr($this->faker->phoneNumber, 0, 15),
        ];
    }
}
