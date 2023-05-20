<?php

namespace Database\Factories;
use App\Models\Preferred_training_field;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Preferred_training_field>
 */
class Preferred_training_fieldFactory extends Factory
{
    protected $model = Preferred_training_field::class;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        
        return [
            'name'=> $this->faker->unique()->word(),

        ];
    }
}
