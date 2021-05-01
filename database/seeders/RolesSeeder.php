<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('roles')->insert([
            'role' => "RCO",
        ]);
        DB::table('roles')->insert([
            'role' => "INVESTIGATOR",
        ]);
        DB::table('roles')->insert([
            'role' => "HOS",
        ]);
        DB::table('roles')->insert([
            'role' => "AG",
        ]);
        DB::table('roles')->insert([
            'role' => "POLICE",
        ]);
    }
}
