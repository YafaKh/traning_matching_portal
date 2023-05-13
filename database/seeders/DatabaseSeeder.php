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
        $companies=Company::factory()->count(4)->create();
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
            foreach ($branches as $branch) 
            {
                $trainer_count = rand(1, 3);
                $trainers = CompanyEmployee::factory()->count($trainer_count)->create();
                $company->employees()->saveMany($trainers);

                $training_count=rand(1, 5);
                $trainings = Training::factory()->count($training_count)->create();
                $trainings->each(function ($training) use ($trainers) {
                    $trainer = $trainers->random();
                    $training->company_employee_id = $trainer->id;
                    $training->save();
                });
                $branch->trainings()->saveMany($trainings);
            }
        }
        EvaluateStudent::factory()->count(15)->create();
        EvaluateCompany::factory()->count(15)->create();
        Student::factory()->count(15)->create();
        Progress::factory()->count(25)->create();
    }
}
