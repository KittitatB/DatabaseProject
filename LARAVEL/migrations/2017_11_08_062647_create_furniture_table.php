<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFurnitureTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('furniture', function (Blueprint $table) {
            $table->increments('id');
			$table->date('change_date');
			$table->date('buy_date');
			$table->integer('cost')->unsigned();
			$table->integer('quantity')->unsigned();
			$table->text('name');
			$table->text('description');
			$table->text('picture');
			$table->string('r_number');
			$table->timestamps();
			
			$table->foreign('r_number')->references('room_number')->on('room');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('furniture');
    }
}
