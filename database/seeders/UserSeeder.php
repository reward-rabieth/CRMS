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
                'password' => Hash::make("password"),
            ]);
        DB::table('users')->insert([
                'name' => "investigator",
                'username' => "investigator",
                'password' => Hash::make("password"),
            ]);
        DB::table('users')->insert([
                'name' => "hos",
                'username' => "hos",
                'password' => Hash::make("password"),
            ]);
        DB::table('users')->insert([
                'name' => "ag",
                'username' => "ag",
                'password' => Hash::make("password"),
            ]);
        DB::table('users')->insert([
                'name' => "police",
                'username' => "police",
                'password' => Hash::make("password"),
            ]);
    }
}
