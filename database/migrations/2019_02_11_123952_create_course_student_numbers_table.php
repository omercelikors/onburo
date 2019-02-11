<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCourseStudentNumbersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('course_student_numbers', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('A1')->nullable();
            $table->integer('A2')->nullable();
            $table->integer('B1')->nullable();
            $table->integer('B2')->nullable();
            $table->integer('C1')->nullable();
            $table->integer('C1+')->nullable();
            $table->integer('YOS')->nullable();
            $table->integer('Other')->nullable();
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
        Schema::dropIfExists('course_student_numbers');
    }
}
