<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRoomTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('room', function (Blueprint $table) {
            $table->string('room_number');
			$table->integer('status')->unsigned();
			$table->date('indate');
			$table->integer('room_type')->unsigned();
			$table->string('invoice');
			$table->string('c_ssn');
			$table->integer('d_id')->unsigned();
			$table->timestamps();
			
			$table->primary('room_number');
			$table->foreign('room_type')->references('type_id')->on('room_type');
			$table->foreign('invoice')->references('invoice_number')->on('bill');
			$table->foreign('c_ssn')->references('ssn')->on('client');
			$table->foreign('d_id')->references('id')->on('dorm');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('room');
    }
}
