<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\UniversityEmployeeRole;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\UniversityEmployee>
 */
class UniversityEmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        $university_role_ids = UniversityEmployeeRole::pluck('id')->all();
        return [
            'employee_num' => $this->faker->unique()->randomNumber(6),
            'email' => $this->faker->unique()->safeEmail,
            'phone' => $this->faker->phoneNumber,
            'password' => Str::substr(bcrypt('password'),15), 
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->lastName,
            'third_name' => $this->faker->lastName,
            'last_name' => $this->faker->lastName,
            'image' => null,
            'university_id' => 1,
            'university_employee_role_id'=> $this->faker->randomElement($university_role_ids)
        ];
    }
}
