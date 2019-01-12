<?php

use Faker\Generator as Faker;

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/

$factory->define(App\User::class, function (Faker $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'email_verified_at' => now(),
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10),
    ];
});
$table->integer('classroom_id')->nullable();
            $table->string('name', 200);
            $table->string('surname', 200);
            $table->enum('status', ['Öğrenci','Aday Öğrenci','Öğretmen','Şirket Çalışanı']);
            $table->dateTime('birthdate');
            $table->string('telephone');
            $table->string('e_mail');
            $table->string('nationality');
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
            $table->string('relative_surname', 200)->nullable();
            $table->string('relative_telephone')->nullable();
            $table->enum('children_status', ['Evet','Hayır'])->nullable();
            $table->integer('children_number')->nullable();
            $table->string('children_age_range')->nullable();
            $table->enum('online_lesson_status', ['Evet','Hayır'])->nullable();
            $table->enum('citizenship_status', ['Evet','Hayır'])->nullable();
            $table->enum('home_status', ['Evet','Hayır'])->nullable();
            $table->string('heard_by')->nullable();
            $table->string('demanded_education')->nullable();
            $table->timestamps();