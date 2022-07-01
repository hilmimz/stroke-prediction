<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('std_summ_0', function (Blueprint $table) {
            $table->id();
            $table->double('age');
            $table->double('hypertension');
            $table->double('heart_disease');
            $table->double('avg_glucose_level');
            $table->double('bmi');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('std_summ_0');
    }
};
