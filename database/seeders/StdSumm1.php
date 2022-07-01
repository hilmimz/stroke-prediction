<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StdSumm1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('std_summ_1')->insert([
            'age' => 12.729422351437828,
            'hypertension' => 0.4449556114211357,
            'heart_disease' => 0.38961953044096487,
            'avg_glucose_level' => 62.309163458832586,
            'bmi' => 5.922378454199009
        ]);
    }
}
