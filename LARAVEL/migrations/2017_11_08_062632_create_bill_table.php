<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateBillTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('bill', function (Blueprint $table) {
            $table->string('invoice_number');
			$table->integer('w_total')->unsigned();
			$table->integer('e_total')->unsigned();
			$table->date('date');
			$table->integer('total')->unsigned();
			$table->integer('d_id')->unsigned();
			$table->string('c_ssn');
			$table->timestamps();
			
			$table->primary('invoice_number');
			$table->foreign('d_id')->references('id')->on('dorm');
			$table->foreign('c_ssn')->references('ssn')->on('client');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('bill');
    }
}
