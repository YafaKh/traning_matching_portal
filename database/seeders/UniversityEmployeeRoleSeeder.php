<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\UniversityEmployeeRole;

class UniversityEmployeeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $roles= [
            [
                'coordinator' => true,
                'supervisor' => false,
            ],
            [
                'coordinator' => false,
                'supervisor' => true,
            ],
            [
                'coordinator' => true,
                'supervisor' => true,
            ],
        ];
        foreach ($roles as $key => $value) {
            UniversityEmployeeRole::create($value);
        } 
    }
}
