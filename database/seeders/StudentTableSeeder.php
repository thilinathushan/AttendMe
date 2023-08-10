<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class StudentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('students')->insert([
            //Student 1
            [
                'first_name' => 'Thilina',
                'last_name' => 'Thushan',
                'birthday' => '2000-08-03',
                'username' => 'ict20949',
                'email' => 'ict20949@fot.sjp.ac.lk',
                'phone_number' => '0779882652',
                'badge' => 2,
                'department' => 1,
                'gender' => 'Male',
                'password' => Hash::make('12345678'),
                'status' => 'active',
                'profile_picture' => '',

            ],
        ]);
    }
}
