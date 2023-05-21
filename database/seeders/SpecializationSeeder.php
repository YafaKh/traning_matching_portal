<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Specialization;

class SpecializationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $specializations= [
            [
                'name' => 'Computer Science',
                'university_id' => 1,
            ],
            [
                'name' => 'Computer Networks',
                'university_id' => 1,
            ],
            [
                'name' => 'Geographic Information System',
                'university_id' => 1,
            ],
            [
                'name' => 'Multimedia Technology',
                'university_id' => 1,
            ],
            [
                'name' => 'Computer Systems Engineering',
                'university_id' => 1,
            ],
        ];
        foreach ($specializations as $key => $value) {
            Specialization::create($value);
        } 
    }
}
