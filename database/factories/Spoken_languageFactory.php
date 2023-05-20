<?php

namespace Database\Factories;
use App\Models\Spoken_language;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Spoken_language>
 */

class Spoken_languageFactory extends Factory
{
    protected $model = Spoken_language::class;

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
