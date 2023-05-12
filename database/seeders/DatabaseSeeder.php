<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\CompanyEmployee;
use App\Models\Training;
use App\Models\EvaluateStudent;
use App\Models\EvaluateCompany;
use App\Models\Student;
use App\Models\Progress;

use Database\Seeders\UniversitySeeder;
use Database\Seeders\SpecializationSeeder;
use Database\Seeders\CompanyEmployeeRoleSeeder;
class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UniversitySeeder::class);
        $this->call(SpecializationSeeder::class);
        Company::factory()->count(4)->create();
        $this->call(CompanyEmployeeRoleSeeder::class);
        CompanyEmployee::factory()->count(5)->create();
        Training::factory()->count(7)->create();
        EvaluateStudent::factory()->count(15)->create();
        EvaluateCompany::factory()->count(15)->create();
        Student::factory()->count(15)->create();
        Progress::factory()->count(25)->create();
    }
}
