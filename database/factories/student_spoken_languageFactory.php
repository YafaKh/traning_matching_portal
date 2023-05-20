<?php

namespace Database\Factories;
use App\Models\Student_spoken_language;
use App\Models\Student;
use App\Models\Spoken_language;


use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student_spoken_language>
 */
class student_spoken_languageFactory extends Factory
{

    protected $model = Student_spoken_language::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public $instance_counter=0;
    public function definition()
    {
        $student_ids = Student::pluck('id')->all();
        $spoken_language_id = Spoken_language::pluck('id')->all();
        $this->instance_counter++;
        return [
            'speaking_level'=>$this->faker->numberBetween(10, 100),
            'writing_level'=>$this->faker->numberBetween(10, 100),
            'listening_level'=>$this->faker->numberBetween(10, 100),
            'student_id' => $this->faker->randomElement($student_ids),
            'spoken_language_id' => $this->faker->randomElement($spoken_language_id),
            
        ];
    }
}
