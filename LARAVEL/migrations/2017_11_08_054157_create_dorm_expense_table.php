<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDormExpenseTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('dorm_expense', function (Blueprint $table) {
			$table->integer('d_id')->unsigned();
            $table->date('datetime');
			$table->integer('eleccost');
			$table->integer('watercost');
			$table->timestamps();
			
			$table->primary('d_id');
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
        Schema::dropIfExists('dorm_expense');
    }
}
