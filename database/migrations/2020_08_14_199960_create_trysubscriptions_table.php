<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateTrysubscriptionsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('trysubscriptions', function (Blueprint $table) {
            $table->increments('id');
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->string("subscription_id")->nullable()->after('user_id');
            $table->string('name')->nullable();
            $table->text('bag_qty')->nullable();
            $table->string('total_bag_price')->nullable();
            $table->string('bag_per_month')->nullable();
            $table->string('ended_at')->nullable();
            $table->string('started_at')->nullable();
            $table->string('end_date')->nullable();
            $table->timestamps();
            $table->enum('status', [0, 1])->default(0)->comment('0->Inactive, 1->Active')->after('updated_at');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('trysubscriptions');
    }

}
