<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\CompanyEmployeeRole;

class CompanyEmployeeRoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $roles= [
            [
                'hr' => true,
                'trainer' => false,
            ],
            [
                'hr' => false,
                'trainer' => true,
            ],
            [
                'hr' => true,
                'trainer' => true,
            ],
        ];
        foreach ($roles as $key => $value) {
            CompanyEmployeeRole::create($value);
        } 
    }
}
