<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
                'name' => "admin",
                'username' => "admin",
                'gender' => "Male",
                'age' => "54",
                'password' => Hash::make("password"),
            ]);
        DB::table('users')->insert([
                'name' => "investigator",
                'gender' => "Male",
                'age' => "34",
                'username' => "investigator",
                'password' => Hash::make("password"),
            ]);
        DB::table('users')->insert([
                'name' => "hos",
                'gender' => "Female",
                'age' => "45",
                'username' => "hos",
                'password' => Hash::make("password"),
            ]);
        DB::table('users')->insert([
                'name' => "ag",
                'gender' => "Male",
                'age' => "36",
                'username' => "ag",
                'password' => Hash::make("password"),
            ]);
        DB::table('users')->insert([
                'name' => "police",
                'gender' => "Female",
                'age' => "57",
                'username' => "police",
                'password' => Hash::make("password"),
            ]);
    }
}
