<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmployeeRole;
use App\Models\Company;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\companyEmployee>
 */
class companyEmployeeFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyEmployee::class;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        //$company_ids = Company::pluck('id')->all();
        $company_role_ids = CompanyEmployeeRole::pluck('id')->all();
        $imgs = ['userImg.png','userImg2.png','userImg3.png','userImg4.png','userImg5.png'];

        return [
            'email' => $this->faker->unique()->safeEmail,
            'password' => bcrypt('password'),
            'phone' => Str::substr($this->faker->phoneNumber, 0, 15),
            'first_name' => $this->faker->firstName,
            'second_name' => $this->faker->lastName,
            'third_name' => $this->faker->firstName,
            'last_name' => $this->faker->lastName,
            'image' =>  $this->faker->randomElement($imgs),
            'contactable' => $this->faker->boolean,
            //'company_id' => $this->faker->randomElement($company_ids),
            'company_employee_role_id' => $this->faker->randomElement($company_role_ids),
        ];
    }
}
