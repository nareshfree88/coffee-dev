<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTrackShippingsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('track_shippings', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('tracking_id')->nullable();
            $table->string('month')->nullable();
             $table->Integer('gift_subscription_id')->unsigned()->index(); // this is working
            $table->foreign('gift_subscription_id')->references('id')->on('gift_subscriptions')->onDelete('cascade');
            $table->string('status')->nullable();
           
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::dropIfExists('track_shippings');
    }

}
