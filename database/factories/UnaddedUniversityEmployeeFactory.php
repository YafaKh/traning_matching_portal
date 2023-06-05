<?php

namespace Database\Factories;
use Illuminate\Support\Str;
use App\Models\Company;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UnaddedCompanyEmployee>
 */
class UnaddedUniversityEmployeeFactory extends Factory
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
            'employee_num' => $this->faker->unique()->randomNumber(6),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => Str::substr($this->faker->phoneNumber, 0, 15),
            'password' => Str::substr(bcrypt('password'),15), 
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->lastName,
            'third_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'image' => null,
        ];
    }
}
