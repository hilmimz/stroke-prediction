<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(MeanSumm0::class);
        $this->call(MeanSumm1::class);
        $this->call(StdSumm0::class);
        $this->call(StdSumm1::class);
    }
}
