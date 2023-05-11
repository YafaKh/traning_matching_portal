<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\University;
use App\Models\Specialization;
use App\Models\Training;
use App\Models\Student;

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
        $university_ids = University::pluck('id')->all();
        $specialization_ids = Specialization::pluck('id')->all();
        $training_ids = Training::pluck('id')->all();

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
            'gpa' => $this->faker->randomFloat(2, 0, 4),
            'address' => $this->faker->address,
            'email' => $this->faker->unique()->safeEmail,
            'password' => Str::substr(bcrypt('password'),15), 
            'availability_date' => $this->faker->date(),
            'connected_with_a_company' => $this->faker->boolean,
            'connected_company_info' => $this->faker->text(100),
            'phone' => $this->faker->phoneNumber,
            'registered' => $this->faker->boolean,
            'image' => $this->faker->imageUrl(),
            'university_id' => $this->faker->randomElement($university_ids),
            'specialization_id' => $this->faker->randomElement($specialization_ids),
            'training_id' => $this->faker->randomElement($training_ids),
           // 'evaluate_student_id' =>1,
           // 'evaluate_company_id' =>1
        ];
    }
    /**
     * Configure the model factory.
     *
     * @return $this
     
    public function configure()
    {
        return $this->afterMaking(function (Student $student) {
            $student->evaluate_student_id = $student->id; // Set evaluate_student_id to the same value as id
            $student->evaluate_company_id = $student->id; // Set evaluate_company_id to the same value as id
        });
    }*/
}
