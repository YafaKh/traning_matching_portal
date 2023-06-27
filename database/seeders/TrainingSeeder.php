<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;
use App\Models\CompanyBranch;
use App\Models\CompanyEmployee;
use App\Models\Student;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CompanyBranch::all()->each(function ($companyBranch) {
        // Create additional fake trainings with trainers
            $trainers = $companyBranch->company->employees
            ->whereIn('company_employee_role_id', [2, 3]);
            
            $companyBranch->company->employees()->saveMany($trainers);

            $trainings = Training::factory()->count(rand(1, 3))->create();
            $trainings->each(function ($training) use ($trainers) {
                $trainer = $trainers->random();
                $training->company_employee_id = $trainer->id;
                $training->save();

                $engaged_students = Student::factory()->count(rand(2, 5))->create(); 
                $training->students()->saveMany($engaged_students);
            });
        
            $companyBranch->trainings()->saveMany($trainings);
        });
    }
}