<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorm', function (Blueprint $table) {
            $table->increments('id');
			$table->text('rule');
			$table->integer('epu')->unsigned();
			$table->integer('wpu')->unsigned();
			$table->text('location');
			$table->text('description');
			$table->text('name');
			$table->integer('n_building')->unsigned();
			$table->integer('n_room')->unsigned();
			$table->date('dt');
			$table->string('o_ssn');
			$table->timestamps();
			
			$table->foreign('o_ssn')->references('ssn')->on('owner');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('dorm');
    }
}
