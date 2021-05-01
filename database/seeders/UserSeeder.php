<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
                'password' => "password",
            ]);
        DB::table('users')->insert([
                'name' => "investigator",
                'username' => "investigator",
                'password' => "password",
            ]);
        DB::table('users')->insert([
                'name' => "hos",
                'username' => "hos",
                'password' => "password",
            ]);
        DB::table('users')->insert([
                'name' => "ag",
                'username' => "ag",
                'password' => "password",
            ]);
        DB::table('users')->insert([
                'name' => "police",
                'username' => "police",
                'password' => "password",
            ]);
    }
}
