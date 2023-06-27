<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Training;
use App\Models\CompanyEmployee;
use App\Models\CompanyBranch;
use App\Models\TrainingField;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Training>
 */
class TrainingFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Training::class;

    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {       
        //$trainers_ids = CompanyEmployee::pluck('id')->all();
        $company_branches_ids = CompanyBranch::pluck('id')->all();
        $training_fields_ids = TrainingField::pluck('id')->all();

        return [
            'name' => $this->faker->word,
            'semester' => $this->faker->numberBetween(1, 4),
            'year' => 2023,
            'details' => $this->faker->text,
            'training_field_id' => $this->faker->randomElement($training_fields_ids),
            'company_branch_id' => $this->faker->randomElement($company_branches_ids),
            //'company_employee_id' => $this->faker->randomElement($trainers_ids),
            // 'branch_id' => CompanyBranchDepartment::factory()->create()->id
        ];
    }
}
