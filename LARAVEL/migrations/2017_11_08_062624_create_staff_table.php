<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateStaffTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('staff', function (Blueprint $table) {
            $table->string('ssn');
			$table->integer('salary')->unsigned();
			$table->string('phone_number');
			$table->text('name');
			$table->boolean('gender');
			$table->text('position');
			$table->text('work_hour');
			$table->integer('i_id')->unsigned();
			$table->integer('d_id')->unsigned();
			$table->timestamps();
			
			$table->primary('ssn');
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
        Schema::dropIfExists('staff');
    }
}
