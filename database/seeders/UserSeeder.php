<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use App\Models\Student;
use App\Models\CompanyEmployee;
use App\Models\UniversityEmployee;
use App\Models\Company;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {       
        $stu_pass = Hash::make('123456789');
        $coo_pass = Hash::make('123456789');
        $sup_pass = Hash::make('123456789');
        $hr_pass = Hash::make('123456789');
        Student::create([
            'student_num' => 201910998,
            'first_name_ar' => 'يافا',
            'first_name_en' => 'Yafa',
            'second_name_ar' => 'عماد',
            'second_name_en' => 'Emad',
            'third_name_ar' => 'يوسف',
            'third_name_en' =>'Yousef',
            'last_name_ar' => 'خطيب',
            'last_name_en' => 'Khateeb',
            'gender' => 1,
            'passed_hours' => 95,
            'load' => 0,//number of hours for this semester without training
            'gpa' => 3.5,
            'email' => 'y.khateeb4@student.aaup.edu',
            'linkedin' => 'https://www.linkedin.com/in/yafa-khateeb-560a66238/',
            'password' => $stu_pass, 
            'english_level' => 4,
            'availability_date' => Carbon::create(2023, 7, 14),
            'connected_with_a_company' => 0,
            'connected_company_info' => '',
            'phone' => '0568449589',
            'registered' => 1,
            'image' => 'stus.png',
            'university_id' => 1,
            'university_employee_id' => 1,
            'specialization_id' =>1,
            'city_id' => 3,
            'work_experience' => 'Auxilium technology- Nablus, Trainee (07/2022 - 08/2022)
            The training dealt with basic information’s in web development, and it was specialized in full-stack programming, working with Laravel and Bootstrap. It also involved collaborative work with teams, utilizing Bitbucket and SourceTree.
            ',
        ]);
        UniversityEmployee::create([
            'employee_num' => '200110998',
            'email' => 'ahmad@aaup.edu',
            'password' => $coo_pass,
            'phone' => '0568880965',
            'first_name' => 'Ahmad',
            'second_name' => 'yousef',
            'third_name' => 'yousef',
            'last_name' => 'Abu Al rob',
            'university_employee_role_id'=> 1
        ]);
        UniversityEmployee::create([
            'employee_num' => '200110997',
            'email' => 'Emad@aaup.edu',
            'password' => $coo_pass,
            'phone' => '0568880965',
            'first_name' => 'Emad',
            'second_name' => 'yousef',
            'third_name' => 'yousef',
            'last_name' => 'Abu Al rob',
            'university_employee_role_id'=> 3
        ]);
        Company::create([
            'name' => 'ForIT',
            'Industry' => 'Web',
            'description' => 'Leading Company providing IT Services and solutions that provide a range of customer-centric services working best for your online business.',
            'website' => 'https://www.google.com/',
            'linkedin' => 'https://www.google.com/',
            'image' => 'comp_8',
        ]);
        CompanyEmployee::create([
            'email' => 'ahmad@aaup.edu',
            'password' => $coo_pass,
            'phone' => '0568880965',
            'first_name' => 'Ahmad',
            'second_name' => 'yousef',
            'third_name' => 'yousef',
            'last_name' => 'Abu Al rob',
            'image' =>'comp_emps1.png',
            'contactable' => 1,
            'company_id' => 8,
            'company_employee_role_id' => 3,
        ]);
        
    }
}
