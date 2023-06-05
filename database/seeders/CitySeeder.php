<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\City;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $cities= [
            ['name' => "Ramallah"],
            ['name' => "Nablus"],
            ['name' => "Jenin"],
            ['name' => "Hebron"],
            ['name' => "Tulkarm"],

        ];
        foreach ($cities as $key => $value) {
            City::create($value);
        } 

    }
}
