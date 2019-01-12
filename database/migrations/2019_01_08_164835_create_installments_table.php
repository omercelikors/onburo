<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateInstallmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('installments', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('installment_number')->nullable();
            $table->decimal('installment1_amount',8,2)->nullable();
            $table->decimal('installment1_paid_amount',8,2)->nullable();
            $table->dateTime('installment1_date')->nullable();
            $table->decimal('installment2_amount',8,2)->nullable();
            $table->decimal('installment2_paid_amount',8,2)->nullable();
            $table->dateTime('installment2_date')->nullable();
            $table->decimal('installment3_amount',8,2)->nullable();
            $table->decimal('installment3_paid_amount',8,2)->nullable();
            $table->dateTime('installment3_date')->nullable();
            $table->decimal('installment4_amount',8,2)->nullable();
            $table->decimal('installment4_paid_amount',8,2)->nullable();
            $table->dateTime('installment4_date')->nullable();
            $table->decimal('installment5_amount',8,2)->nullable();
            $table->decimal('installment5_paid_amount',8,2)->nullable();
            $table->dateTime('installment5_date')->nullable();
            $table->decimal('installment6_amount',8,2)->nullable();
            $table->decimal('installment6_paid_amount',8,2)->nullable();
            $table->dateTime('installment6_date')->nullable();
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
        Schema::dropIfExists('installments');
    }
}
