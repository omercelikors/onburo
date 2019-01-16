<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePeopleTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('people', function (Blueprint $table) {
            $table->increments('id');
            $table->integer('classroom_id')->nullable();
            $table->string('name', 200);
            $table->enum('status', ['Öğrenci','Aday Öğrenci','Öğretmen','Şirket Çalışanı']);
            $table->dateTime('birthdate');
            $table->string('telephone');
            $table->string('e_mail');
            $table->string('country');
            $table->string('language')->nullable();
            $table->enum('book_status', ['Evet','Hayır']);
            $table->string('note')->nullable();
            $table->string('registration_by');
            $table->enum('sex', ['Erkek','Kız'])->nullable();
            $table->enum('marital_status', ['Evli','Bekar'])->nullable();
            $table->enum('university_status', ['Evet','Hayır'])->nullable();
            $table->string('university_department')->nullable();
            $table->enum('relative_university_status', ['Evet','Hayır'])->nullable();
            $table->string('relative_name', 200)->nullable();
            $table->string('relative_telephone')->nullable();
            $table->enum('children_status', ['Evet','Hayır'])->nullable();
            $table->integer('children_number')->nullable();
            $table->enum('children_age_range', ['0-10 Yaş','10-20 Yaş','20-30 Yaş'])->nullable();
            $table->enum('online_lesson_status', ['Evet','Hayır'])->nullable();
            $table->enum('citizenship_status', ['Evet','Hayır'])->nullable();
            $table->enum('home_status', ['Evet','Hayır'])->nullable();
            $table->string('heard_by')->nullable();
            $table->string('demanded_education')->nullable();
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
        Schema::dropIfExists('people');
    }
}
