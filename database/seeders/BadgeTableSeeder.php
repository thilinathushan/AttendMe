<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;

class BadgeTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('badges')->insert([
            //Badge 1
            [
                'BadgeCode' => 'b18-19',
                'BadgeName' => '2018/2019',
            ],
            //Badge 2
            [
                'BadgeCode' => 'b19-20',
                'BadgeName' => '2019/2020',
            ],
        ]);
    }
}
