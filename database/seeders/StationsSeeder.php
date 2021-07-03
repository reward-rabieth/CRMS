<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StationsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('stations')
            ->insert([
                ['name'=>'MSIMBAZI','district'=>'ILALA','code'=>'111'],
                ['name'=>'OYSTERBAY','district'=>'KINONDONI','code'=>'112'],
                ['name'=>'SEGEREA','district'=>'ILALA','code'=>'113'],
                ['name'=>'STESHENI','district'=>'ILALA','code'=>'114'],
            ]);
    }
}
