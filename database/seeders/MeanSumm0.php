<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeanSumm0 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mean_summ_0')->insert([
            'age' => 42.048437419020466,
            'hypertension' => 0.0912153407618554,
            'heart_disease' => 0.047162477325732054,
            'avg_glucose_level' => 105.02513345426276,
            'bmi' => 28.863280642653535
        ]);
    }
}
