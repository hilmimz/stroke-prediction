<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class MeanSumm1 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('mean_summ_1')->insert([
            'age' => 67.76716692189893,
            'hypertension' => 0.27182235834609497,
            'heart_disease' => 0.18657478305257785,
            'avg_glucose_level' => 133.23305513016845,
            'bmi' => 30.313297600816743
        ]);
    }
}
