<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateEquipmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('equipment_name')->nullable();
            $table->string('price')->nullable();
            $table->text('description')->nullable();
            $table->string('color')->nullable();
            $table->string('quantity')->nullable();
            $table->string('image')->nullable();
            $table->enum('status',[0,1])->default(1)->comment('0->Inactice,1->Active');
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
        Schema::drop('equipments');
    }
}
