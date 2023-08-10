<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class ModuleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('modules')->insert([
            //Module 1
            [
                'ModuleCode' => 'itc1023',
                'ModuleName' => 'Physics for Technology',
                'Year' => '1',
                'Semester' => '1',
            ],
            //Module 2
            [
                'ModuleCode' => 'itc1153',
                'ModuleName' => 'Object Oriented Analysis & Design',
                'Year' => '1',
                'Semester' => '2',
            ],
            //Module 3
            [
                'ModuleCode' => 'itc2243',
                'ModuleName' => 'Networking Essentials',
                'Year' => '2',
                'Semester' => '1',
            ],
            //Module 3
            [
                'ModuleCode' => 'itc2223',
                'ModuleName' => 'Web Application Development',
                'Year' => '2',
                'Semester' => '2',
            ],
        ]);
    }
}
