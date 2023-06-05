<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

use App\Models\Company;
use App\Models\City;

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
        $cities_ids = City::pluck('id')->all();
        return [
            'city_id' => $this->faker->randomElement($cities_ids),
            'address' => Str::substr($this->faker->address,1,10),
            //'company_id' =>  $this->faker->randomElement($company_ids),
        ];
    }
}
