<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class GiftSubscriptions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gift_subscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string('name')->nullable();
            $table->string('name_fr')->nullable();
            $table->string('price')->nullable();
            $table->string('customer_trans_id')->nullable();
            $table->string('quantity')->nullable();
            $table->string('month')->nullable();
            $table->string('subscription_code')->nullable();
            $table->enum('status', [0, 1])->default(0)->comment('0->active,1->inactive')->nullable();
            $table->string('fname')->nullable();
            $table->string('lname')->nullable();
            $table->text('address')->nullable();
            $table->string('apt')->nullable();
            $table->string('country')->nullable();
            $table->string('state')->nullable();
            $table->string('city')->nullable();
            $table->string('pin_code')->nullable();
            $table->string('contact')->nullable();
            $table->string('request_grind')->nullable();
            $table->string('claimed_at')->nullable();
            $table->string('expiring_at')->nullable();
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::drop('subscriptions');
    }
}
