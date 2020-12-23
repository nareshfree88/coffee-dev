<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateSubscriptionPlansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('subscription_plans', function (Blueprint $table) {
            $table->increments('id');
            $table->string('plan_name')->nullable();
            $table->string('price')->nullable();
            $table->string('price_id')->nullable();
            $table->string('product_id')->nullable();
            $table->string('currency')->nullable();
            $table->string('recurring')->nullable();
            $table->string('image')->nullable();
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
        Schema::drop('subscription_plans');
    }
}
