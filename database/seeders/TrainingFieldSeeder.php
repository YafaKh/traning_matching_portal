<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingField;

class TrainingFieldSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $fields= [
            ['name' => "Front-End"],
            ['name' => "Back-End"],
            ['name' => "Full-Stack"],
            ['name' => "VR"],
            ['name' => "Data Science"],
            ['name' => "Laravel"],

        ];
        foreach ($fields as $key => $value) {
            TrainingField::create($value);
        } 
    }
}
