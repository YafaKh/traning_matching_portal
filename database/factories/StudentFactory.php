<?php

namespace Database\Factories;

use Illuminate\Support\Str;
use App\Models\University;
use App\Models\Specialization;
use App\Models\Training;
use App\Models\Student;
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
    // to give the evaluate_student_id and company_student_id thw same Id as student becuase they are 1:1 relations
    public $instance_counter=0;
    public function definition()
    {
        $university_ids = University::pluck('id')->all();
        $specialization_ids = Specialization::pluck('id')->all();
        $training_ids = Training::pluck('id')->all();
        $this->instance_counter++;

        return [
            'student_num' => $this->faker->unique()->randomNumber(8),
            'first_name_ar' => $this->faker->firstName,
            'first_name_en' => $this->faker->firstName,
            'second_name_ar' => $this->faker->firstName,
            'second_name_en' => $this->faker->firstName,
            'third_name_ar' => $this->faker->firstName,
            'third_name_en' => $this->faker->firstName,
            'last_name_ar' => $this->faker->lastName,
            'last_name_en' => $this->faker->lastName,
            'gender' => $this->faker->randomElement([0, 1]),
            'passed_hours' => $this->faker->numberBetween(0, 200),
            'load' => $this->faker->numberBetween(0, 21),
            'gpa' => $this->faker->randomFloat(2, 0, 4),
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Str::substr(bcrypt('password'),15), 
            'availability_date' => $this->faker->date(),
            'connected_with_a_company' => $this->faker->boolean,
            'connected_company_info' => $this->faker->text(100),
            'phone' => Str::substr($this->faker->phoneNumber, 0, 15),
            'registered' => $this->faker->boolean,
            'image' => $this->faker->imageUrl(),
            'university_id' => $this->faker->randomElement($university_ids),
            'specialization_id' => $this->faker->randomElement($specialization_ids),
            'training_id' => $this->faker->randomElement($training_ids),
            'evaluate_student_id' => $this->instance_counter,
            'evaluate_company_id' => $this->instance_counter,
        ];
    }

}
