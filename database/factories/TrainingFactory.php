<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Training;
use App\Models\CompanyEmployee;
use App\Models\CompanyBranch;

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
        $company_branch_ids = CompanyBranch::pluck('id')->all();

        return [
            'name' => $this->faker->word,
            'semester' => $this->faker->numberBetween(1, 4),
            'year' => 2023,
            'training_feild' => $this->faker->word,
            'details' => $this->faker->text,
            'company_branch_id' => $this->faker->randomElement($company_branch_ids),
            //'company_employee_id' => $this->faker->randomElement($trainers_ids),
            // 'branch_id' => CompanyBranchDepartment::factory()->create()->id
        ];
    }
}
