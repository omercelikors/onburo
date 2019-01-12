<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('person_id');
            $table->enum('course_type', ['A1','A2','B1','B2','C1','C1+']);
            $table->decimal('debt_amount',8,2);
            $table->decimal('paid_amount',8,2);
            $table->decimal('remaining_amount',8,2);
            $table->enum('currency_unit', ['Türk Lirası','Dolar']);
            $table->string('note')->nullable();
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
        Schema::dropIfExists('payments');
    }
}
