<?php

namespace Database\Seeders;
use App\Models\City;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        City::create([
            'id' => 1,
            'name' => 'Janin',
        ]);

        City::create([
            'id' => 2,
            'name' => 'Nablus',
        ]);

        City::create([
            'id' => 3,
            'name' => 'Ramallah',
        ]);

        City::create([
            'id' => 4,
            'name' => 'Tulkarm',
        ]);
    }
}
