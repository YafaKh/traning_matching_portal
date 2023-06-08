<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\TrainingFeild;

class TrainingFeildSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $feilds= [
            ['name' => "Front-End"],
            ['name' => "Back-End"],
            ['name' => "Full-Stack"],
            ['name' => "VR"],
            ['name' => "Data Science"],
            ['name' => "Laravel"],

        ];
        foreach ($feilds as $key => $value) {
            TrainingFeild::create($value);
        } 
    }
}
