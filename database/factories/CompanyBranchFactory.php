<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\CompanyBranch>
 */
class CompanyBranchFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //$company_ids = Company::pluck('id')->all();
        return [
            'address' => Str::substr($this->faker->address,1,10),
            //'company_id' =>  $this->faker->randomElement($company_ids),
        ];
    }
}
