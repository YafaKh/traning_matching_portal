<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Training;
use App\Models\CompanyBranch;
use App\Models\CompanyEmployee;

class TrainingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Create "Unengaged Trainees" training for each company branch
        //to save new students temporary
        CompanyBranch::all()->each(function ($companyBranch) {
            $companyBranch->trainings()->create([
                'name' => 'Unengaged Trainees',
                'semester' => 1,
            ]);
        // Create additional fake trainings with trainers
            $trainer_count = rand(1, 3);
            $trainers = CompanyEmployee::factory()->count($trainer_count)->create();
            $companyBranch->company->employees()->saveMany($trainers);
        
            $training_count = rand(1, 5);
            $trainings = Training::factory()->count($training_count)->create();
            $trainings->each(function ($training) use ($trainers) {
                $trainer = $trainers->random();
                $training->company_employee_id = $trainer->id;
                $training->save();
            });
        
            $companyBranch->trainings()->saveMany($trainings);
        });
    }
}