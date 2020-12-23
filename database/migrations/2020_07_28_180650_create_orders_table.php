<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateOrdersTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('orders', function (Blueprint $table) {
            $table->increments('id');
//            $table->string('sku')->nullable();
//            $table->Integer('product_id')->unsigned()->index(); // this is working
//            $table->foreign('product_id')->references('id')->on('products')->onDelete('cascade');
            $table->bigInteger('user_id')->unsigned()->index(); // this is working
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->text('product_description')->nullable()->after('user_id');
            $table->string('product_name')->nullable();
            $table->string('product_price')->nullable();
            $table->string('quantity')->nullable();
            $table->string('product_id')->nullable();
            $table->string('flat_rate')->nullable();
            $table->string('customer_trans_id')->nullable();
            $table->string('sub_total')->nullable();
            $table->string('gift_sub_total')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('channel_name')->nullable();
            $table->enum('status', [0, 1, 2])->default(0)->comment('0->placed,1->shipped,2->deliver')->nullable();
            $table->enum('order_status', [0,1])->default(0)->comment('0->Inactive,1->Active');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down() {
        Schema::drop('orders');
    }

}
