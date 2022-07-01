<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StdSumm0 extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('std_summ_0')->insert([
            'age' => 22.265901524045592,
            'hypertension' => 0.28795240738636413,
            'heart_disease' => 0.21201374037673143,
            'avg_glucose_level' => 43.942664899234494,
            'bmi' => 7.772154021940319
        ]);
    }
}
