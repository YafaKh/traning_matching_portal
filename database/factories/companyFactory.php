<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\Company;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->company,
            'Industry' => $this->faker->text(10),
            'description' => $this->faker->text(200),
            'website' => $this->faker->url(44),
            'linkedin' => $this->faker->url,
        ];
    }
}
