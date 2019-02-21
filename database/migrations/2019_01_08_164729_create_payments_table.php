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
            $table->enum('currency_unit', ['Türk Lirası','Dolar']);
            $table->enum('paid_description', ['A1','A2','B1','B2','C1','C1+','YÖS','Diğer']);
            $table->enum('book_status', ['Evet','Hayır'])->nullable();
            $table->decimal('debt_amount',8,2);
            $table->decimal('cash_paid_amount',8,2);
            $table->date('cash_paid_amount_date');
            $table->decimal('total_remaining_amount',8,2);
            $table->integer('installment_number')->nullable();
            $table->decimal('installment1_amount',8,2)->nullable();
            $table->decimal('installment1_paid_amount',8,2)->nullable();
            $table->decimal('installment1_remaining_amount',8,2)->nullable();
            $table->date('installment1_date')->nullable();
            $table->decimal('installment2_amount',8,2)->nullable();
            $table->decimal('installment2_paid_amount',8,2)->nullable();
            $table->decimal('installment2_remaining_amount',8,2)->nullable();
            $table->date('installment2_date')->nullable();
            $table->decimal('installment3_amount',8,2)->nullable();
            $table->decimal('installment3_paid_amount',8,2)->nullable();
            $table->decimal('installment3_remaining_amount',8,2)->nullable();
            $table->date('installment3_date')->nullable();
            $table->decimal('installment4_amount',8,2)->nullable();
            $table->decimal('installment4_paid_amount',8,2)->nullable();
            $table->decimal('installment4_remaining_amount',8,2)->nullable();
            $table->date('installment4_date')->nullable();
            $table->decimal('installment5_amount',8,2)->nullable();
            $table->decimal('installment5_paid_amount',8,2)->nullable();
            $table->decimal('installment5_remaining_amount',8,2)->nullable();
            $table->date('installment5_date')->nullable();
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
