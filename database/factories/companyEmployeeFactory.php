<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompanyEmployee;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\companyEmployee>
 */
class companyEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyEmployee::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'phone' => $this->faker->phoneNumber,
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->lastName,
            'third_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'image' => $this->faker->imageUrl(),
            'contact_person' => $this->faker->boolean,
            'company_id' => 1, 
            'employees_roles' => 1,
        ];
    }
}
