<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCurrencyRatesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('currency_rates', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('base')->nullable();
            $table->string('date')->nullable();
            $table->string('cad_rate')->nullable();
            $table->string('usd_rate')->nullable();
            $table->string('conversion_rate')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('currency_rates');
    }

}
