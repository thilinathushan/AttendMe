<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class LecturerTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('lecturers')->insert([
            //Lecturer 1
            [
                'first_name' => 'Pamuditha',
                'last_name' => 'Lakshan',
                'birthday' => '2000-06-03',
                'username' => 'ict20879',
                'email' => 'ict20879@fot.sjp.ac.lk',
                'phone_number' => '0714276464',
                'department' => null,
                'module' => null,
                'gender' => 'Male',
                'password' => Hash::make('12345678'),
                'status' => 'active',
                'profile_picture' => '',

            ],
        ]);
    }
}
