<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\CompanyEmployee;
use App\Models\CompanyEmployeeRole;
use App\Models\Training;
use App\Models\EvaluateStudent;
use App\Models\EvaluateCompany;
use App\Models\Student;
use App\Models\Progress;

use App\Models\UnaddedCompanyEmployee;
use App\Models\Spoken_language;
use App\Models\Student_spoken_language;
use App\Models\Skill;
use App\Models\Student_Skill;


use Database\Seeders\UniversitySeeder;
use Database\Seeders\SpecializationSeeder;
use Database\Seeders\CompanyEmployeeRoleSeeder;
use Database\Seeders\TrainingSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UniversitySeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(TrainingSeeder::class); // Move TrainingSeeder here

        $companies = Company::factory()->count(4)->create();
        $this->call(CompanyEmployeeRoleSeeder::class);

        foreach ($companies as $company) {
            $branch_count = rand(1, 5);
            $branches = CompanyBranch::factory()->count($branch_count)->create();
            $company->branches()->saveMany($branches);

            $hr_count = rand(1, 3);
            $hr = CompanyEmployee::factory()->count($hr_count)->create();
            $company->employees()->saveMany($hr);

            $role = CompanyEmployeeRole::find(1); 
            $hr->each(function ($employee) use ($role) {
                $employee->roles()->associate($role);
            });
        }
        $this->call(TrainingSeeder::class);
        EvaluateStudent::factory()->count(20)->create();
        EvaluateCompany::factory()->count(20)->create();
        Student::factory()->count(20)->create();
        Progress::factory()->count(25)->create();
        UnaddedCompanyEmployee::factory()->count(10)->create();
        Spoken_language::factory()->count(2)->create();
        Student_spoken_language::factory()->count(2)->create();
        Skill::factory()->count(5)->create();
        Student_Skill::factory()->count(5)->create();


    }
}
