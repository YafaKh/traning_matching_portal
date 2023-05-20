<?php

namespace Database\Factories;
use App\Models\Student_Skill;
use App\Models\Student;
use App\Models\Skill;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Student_Skill>
 */
class Student_SkillFactory extends Factory
{
    protected $model = Student_Skill::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
     public $instance_counter=0;

    public function definition()
    {
        $studentIds  = Student::pluck('id')->all();
        $skillIds  = Skill::pluck('id')->all();
        $this->instance_counter++;
        return [
            'level'=>$this->faker->numberBetween(10, 100),
            'student_id' => $this->faker->randomElement($studentIds),
            'skill_id' => $this->faker->randomElement($skillIds),
            
        ];
    }
    public function tableName()
    {
        return 'students_skills'; 
    }  
}
