<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;


class AdminTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('administrators')->insert([
            //Admin 1
            [
                'first_name' => 'Chamila',
                'last_name' => 'Kaluthilaka',
                'birthday' => '2000-08-03',
                'username' => 'ictchamila',
                'email' => 'ictchamila@fot.sjp.ac.lk',
                'phone_number' => '0771234567',
                'gender' => 'Male',
                'password' => Hash::make('12345678'),
                'status' => 'active',
                'profile_picture' => '',

            ],
        ]);
    }
}
