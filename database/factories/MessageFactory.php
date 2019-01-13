<?php

use Faker\Generator as Faker;

$factory->define(App\Message::class, function (Faker $faker) {
    return [
        'person_id'=> $faker->numberBetween($min = 1, $max = 100),
        'message_type' => $faker -> randomElement($array = array ('SMS','E-posta','SMS ve E-posta')),
        'text'  => $faker->text($maxNbChars = 200),
        'sended_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '1 years')
    ];
});
