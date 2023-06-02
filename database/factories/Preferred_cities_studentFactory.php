<?php

namespace Database\Factories;
use App\Models\Student;
use App\Models\City;
use App\Models\Preferred_cities_student;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preferred_cities_student>
 */
class Preferred_cities_studentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $studentIds = Student::pluck('id')->all();
        $cityIds = City::pluck('id')->all();
        return [
            'student_id' => $this->faker->randomElement($studentIds),
            'city_id' => $this->faker->randomElement($cityIds),
        ];
       
    }
}
