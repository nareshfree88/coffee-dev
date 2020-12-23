<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateAddressesTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('addresses', function (Blueprint $table) {
            $table->increments('id');
             $table->string('first_name')->nullable();
            $table->string('last_name')->nullable();
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('address')->nullable();
            $table->string('city')->nullable();
            $table->string('state')->nullable();
            $table->string('country')->nullable();
            $table->string('flat_rate')->nullable();
            $table->string('post_code')->nullable();
            $table->enum('default_address',[0,1])->default(0)->comment('0->no,1->yes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('addresses');
    }

}
