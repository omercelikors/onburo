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
            $table->integer('agency_id')->nullable();
            $table->string('name', 200);
            $table->string('surname', 200);
            $table->enum('status', ['Öğrenci','Aday Öğrenci','Öğretmen','Şirket Çalışanı']);
            $table->enum('join_status', ['Aktif','Pasif'])->nullable();
            $table->string('taken_courses')->nullable();
            $table->date('birthdate');
            $table->integer('age');
            $table->string('telephone');
            $table->string('e_mail');
            $table->string('country')->nullable();
            $table->string('languages')->nullable();
            $table->enum('book_status', ['Evet','Hayır'])->nullable();
            $table->string('why_choose_us')->nullable();
            $table->enum('why_abandon_us_status', ['Hoca Sorunu','Ücret Sorunu','Kişisel Nedenler'])->nullable();
            $table->string('why_abandon_us_note')->nullable();
            $table->string('registration_by')->nullable();

            $table->enum('sex_status', ['Erkek','Kız'])->nullable();
            $table->enum('marital_status', ['Evli','Bekar'])->nullable();
            $table->enum('university_status', ['Evet','Hayır'])->nullable();
            $table->string('university_department')->nullable();
            $table->enum('education_level_status', ['Önlisans','Lisans', 'Yüksek Lisans','Doktora'])->nullable();
            $table->string('note')->nullable();
            $table->enum('relative_university_status', ['Evet','Hayır'])->nullable();
            $table->string('relative_name', 200)->nullable();
            $table->string('relative_telephone')->nullable();
            $table->enum('relative_education_level_status', ['Önlisans','Lisans', 'Yüksek Lisans','Doktora'])->nullable();
            $table->enum('children_status', ['Evet','Hayır'])->nullable();
            $table->integer('children_number')->nullable();
            $table->string('children_age_range_status')->nullable();
            $table->enum('online_lesson_status', ['Evet','Hayır'])->nullable();
            $table->enum('citizenship_status', ['Evet','Hayır'])->nullable();
            $table->enum('home_status', ['Evet','Hayır'])->nullable();
            $table->enum('heard_by_status', ['Google','Instagram','Facebook','Diğer'])->nullable();
            $table->string('heard_by_other')->nullable();
            $table->enum('demanded_education_status', ['YÖS','Online','Diğer Diller'])->nullable();
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
