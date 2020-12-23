<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateProductsTable extends Migration {

    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up() {
        Schema::create('products', function (Blueprint $table) {
            $table->increments('id');
            $table->string('sku')->nullable();
            $table->string('name')->nullable();
            $table->string('name_fr')->nullable();
            $table->text('description')->nullable();
            $table->text('description_fr')->nullable();
            $table->text('long_description')->nullable();
            $table->text('long_description_fr')->nullable();
            $table->string('category')->nullable();
            $table->string('equip_addon')->nullable();
            $table->string('quantity')->nullable();
            $table->string('attribute_family')->nullable();
            $table->string('type')->nullable();
            $table->string('type_fr')->nullable();
            $table->enum('status', [0, 1])->default(0)->comment('0->pending ,1->complete');
            $table->string('price')->nullable();
            $table->string('cost')->nullable();
            $table->string('special_price')->nullable();
            $table->string('special_price_from')->nullable();
            $table->string('special_price_to')->nullable();
            $table->string('url_key')->nullable();
            $table->string('tax_category')->nullable();
            $table->string('new')->nullable();
            $table->string('featured')->nullable();
            $table->string('visible_individually')->nullable();
            $table->string('color')->nullable();
            $table->string('brand')->nullable();
            $table->string('size')->nullable();
            $table->string('width')->nullable();
            $table->string('height')->nullable();
            $table->string('depth')->nullable();
            $table->string('weight')->nullable();
            $table->string('image')->nullable();
            $table->string('channel')->nullable();
            $table->string('up_selling')->nullable();
            $table->string('cross_seling')->nullable();
            
            

            
            
            
            
            
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
        Schema::drop('products');
    }

}
