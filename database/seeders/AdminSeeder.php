<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Admin;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {       
        $password = Hash::make('123456789');
        Admin::create([
                'email' => 'yafa.khateeb4@gmail.com',
                'password' => $password,
                'first_name' => 'Yafa',
                'second_name' => 'Emad',
                'third_name' => 'Yousef',
                'last_name' => 'Khateeb',
        ]);
        
    }
}
