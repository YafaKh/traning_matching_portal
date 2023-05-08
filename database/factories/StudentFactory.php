<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student>
 */
class StudentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'student_num' => $this->faker->unique()->randomNumber(8),
            'first_arabic_name' => $this->faker->firstName,
            'first_english_name' => $this->faker->firstName,
            'second_arabic_name' => $this->faker->firstName,
            'second_english_name' => $this->faker->firstName,
            'third_arabic_name' => $this->faker->firstName,
            'third_english_name' => $this->faker->firstName,
            'last_arabic_name' => $this->faker->lastName,
            'last_english_name' => $this->faker->lastName,
            'gender' => $this->faker->randomElement([0, 1]),
            'passed_hours' => $this->faker->numberBetween(0, 200),
            'gpa' => $this->faker->randomFloat(2, 0, 4),
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'), // You may change the default password
            'availability_date' => $this->faker->date(),
            'connected_with_a_company' => $this->faker->boolean,
            'connected_company_info' => $this->faker->text(100),
            'phone' => $this->faker->phoneNumber,
            'registered' => $this->faker->boolean,
            'image' => $this->faker->imageUrl(),
            'university_id' => $this->faker->numberBetween(1, 10), // Replace with actual university IDs
            'specialization_id' => $this->faker->numberBetween(1, 5), // Replace with actual specialization IDs
            'training_id' => $this->faker->numberBetween(1, 20), // Replace with actual training IDs
        ];
    }
}
