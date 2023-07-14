<?php

namespace Database\Seeders;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\CompanyBranch;
use App\Models\CompanyEmployee;
use App\Models\UniversityEmployee;
use App\Models\CompanyEmail;
use App\Models\CompanyPhone;
use App\Models\CompanyEmployeeRole;
use App\Models\Student;
use App\Models\Progress;
use App\Models\UnaddedCompanyEmployee;
use App\Models\UnaddedUniversityEmployee;
use App\Models\UnaddedCompany;
use App\Models\Skill;
use App\Models\SkillStudent;
use App\Models\PreferredTrainingField;
use App\Models\Visit;

use Database\Seeders\CitySeeder;
use Database\Seeders\UniversitySeeder;
use Database\Seeders\SpecializationSeeder;
use Database\Seeders\CompanyEmployeeRoleSeeder;
use Database\Seeders\UniversityEmployeeRoleSeeder;
use Database\Seeders\TrainingSeeder;
use Database\Seeders\TrainingFieldSeeder;
use Database\Seeders\AdminSeeder;
use Database\Seeders\UserSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        $this->call(UniversitySeeder::class);
        $this->call(SpecializationSeeder::class);
        $this->call(UniversityEmployeeRoleSeeder::class);
        $this->call(CitySeeder::class);
        $this->call(TrainingFieldSeeder::class);
        $this->call(AdminSeeder::class);
        $companies = Company::factory()->count(7)->create();

        $this->call(CompanyEmployeeRoleSeeder::class);
        UniversityEmployee::factory()->count(10 )->create();

        //create students not connected with any company
        Student::factory()->count(8)->create();

        foreach ($companies as $company) {
            
            $branches = CompanyBranch::factory()->count(rand(1, 3))->create();
            $company->branches()->saveMany($branches);

            // Create "Unengaged Trainees" training for each company branch
            //to save new students temporary
            $branch = $company->branches()->first();
            $unengaged_training = $branch->trainings()->create([
                'name' => 'Unengaged Trainees',
                'semester' => 1,
            ]);
            $unengaged_students = Student::factory()->count(4)->create();
            $unengaged_training->students()->saveMany($unengaged_students);

            $employees = CompanyEmployee::factory()->count(rand(3, 9))->create();
            $company->employees()->saveMany($employees);

            $emails = CompanyEmail::factory()->count(rand(1, 3))->create();
            $company->emails()->saveMany($emails);

            $phones = CompanyPhone::factory()->count(rand(1, 3))->create();
            $company->phones()->saveMany($phones);

            $role = CompanyEmployeeRole::find(1); 
            $employees->each(function ($employee) use ($role) {
                $employee->roles()->associate($role);
            });
        }
        $this->call(TrainingSeeder::class);
        Progress::factory()->count(25)->create();
        UnaddedCompanyEmployee::factory()->count(10)->create();
        UnaddedUniversityEmployee::factory()->count(10)->create();
        Skill::factory()->count(5)->create();
        SkillStudent::factory()->count(10)->create();

        PreferredTrainingField::factory()->count(5)->create();
        PreferredTrainingField::factory()->count(10)->create();
        Visit::factory()->count(60)->create();

        for($i = 0; $i < 4 ; $i++){
           $temp_company= UnaddedCompany::factory()->create();
           $temp_emp= UnaddedCompanyEmployee::factory()->create();
           $temp_emp->company_addition =0;
           $temp_emp->company_id = $temp_company->id;
           $temp_emp->save();
        }
        $this->call(UserSeeder::class);
    }


}
