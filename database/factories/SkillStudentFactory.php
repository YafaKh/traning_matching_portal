<?php

namespace Database\Factories;
use App\Models\Student;
use App\Models\Skill;
use App\Models\SkillStudent;



use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\SkillStudent>
 */
class SkillStudentFactory extends Factory
{

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    protected $model = SkillStudent::class;


    public function definition()
    {
        $student_ids = Student::pluck('id')->all();
        $skill_ids = Skill::pluck('id')->all();

        return [
            'skill_id' => $this->faker->randomElement($skill_ids),
            'student_id' => $this->faker->randomElement($student_ids),

        ];
    }
}
