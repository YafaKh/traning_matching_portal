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
use App\Models\Training;
use App\Models\Student;
use App\Models\Progress;
use App\Models\UnaddedCompanyEmployee;
use App\Models\UnaddedUniversityEmployee;
use App\Models\Spoken_language;
use App\Models\Student_spoken_language;
use App\Models\Skill;
use App\Models\Student_Skill;
use App\Models\City;
use App\Models\Preferred_cities_student;
use App\Models\Preferred_training_field_student;
use App\Models\Preferred_training_field;

use Database\Seeders\CitySeeder;
use Database\Seeders\UniversitySeeder;
use Database\Seeders\SpecializationSeeder;
use Database\Seeders\CompanyEmployeeRoleSeeder;
use Database\Seeders\UniversityEmployeeRoleSeeder;
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
        $this->call(UniversityEmployeeRoleSeeder::class);
        $this->call(CitySeeder::class);
        $companies = Company::factory()->count(20)->create();

        $this->call(CompanyEmployeeRoleSeeder::class);
        UniversityEmployee::factory()->count(10 )->create();

        //create students not connected with any company
        Student::factory()->count(10 )->create();

        foreach ($companies as $company) {
            
            $branches = CompanyBranch::factory()->count(rand(1, 5))->create();
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

            $hr = CompanyEmployee::factory()->count(rand(1, 3))->create();
            $company->employees()->saveMany($hr);

            $emails = CompanyEmail::factory()->count(rand(1, 3))->create();
            $company->emails()->saveMany($emails);

            $phones = CompanyPhone::factory()->count(rand(1, 3))->create();
            $company->phones()->saveMany($phones);

            $role = CompanyEmployeeRole::find(1); 
            $hr->each(function ($employee) use ($role) {
                $employee->roles()->associate($role);
            });
        }
        $this->call(TrainingSeeder::class);
        //Student::factory()->count(20)->create();
        Progress::factory()->count(25)->create();
        UnaddedCompanyEmployee::factory()->count(10)->create();
        UnaddedUniversityEmployee::factory()->count(10)->create();
        Spoken_language::factory()->count(2)->create();
        Student_spoken_language::factory()->count(2)->create();
        Skill::factory()->count(5)->create();
        Student_Skill::factory()->count(5)->create();
        Preferred_cities_student::factory()->count(2)->create();
        Preferred_training_field::factory()->count(5)->create();
        Preferred_training_field_student::factory()->count(10)->create();

    }

}
