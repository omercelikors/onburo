<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRecruitmentsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('recruitments', function (Blueprint $table) {
            $table->increments('id');
            $table->string('name', 200);
            $table->string('surname', 200);
            $table->string('telephone')->nullable();
            $table->string('e_mail')->nullable();
            $table->string('country')->nullable();
            $table->string('university')->nullable();
            $table->string('branch')->nullable();
            $table->string('learning_language')->nullable();
            $table->string('degree')->nullable();
            $table->string('application_status')->nullable();
            $table->string('heard_by')->nullable();
            $table->string('agency')->nullable();
            $table->string('consultancy')->nullable();
            $table->string('notes')->nullable();
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
        Schema::dropIfExists('recruitments');
    }
}
