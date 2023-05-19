<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Company;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnaddedCompanyEmployee>
 */
class UnaddedCompanyEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $company_ids = Company::pluck('id')->all();
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => Str::substr(bcrypt('password'), 0, 15),
            'phone' => Str::substr($this->faker->phoneNumber, 0, 15),
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->lastName,
            'third_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'image' => $this->faker->imageUrl(),
            'company_id' => $this->faker->randomElement($company_ids),
        ];
    }
}
