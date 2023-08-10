<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class DepartmentTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('departments')->insert([
            //Department 1
            [
                'DepartmentCode' => 'ict',
                'DepartmentName' => 'ICT - Information & Communication Technology',
            ],
            //Department 2
            [
                'DepartmentCode' => 'egt',
                'DepartmentName' => 'EGT - Engineering Technology',
            ],
        ]);
    }
}
