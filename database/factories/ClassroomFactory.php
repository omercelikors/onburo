<?php

use Faker\Generator as Faker;

$factory->define(App\Classroom::class, function (Faker $faker) {
    $unixTimestap = '2461067200';
    return [
        'ogretmen_id' => $faker ->optional()->numberBetween($min = 1, $max = 50),
        'course_type' => $faker ->randomElement($array = array ('A1','A2','B1','B2','C1','C1+')),
        'time' => $faker ->randomElement($array = array ('Sabah','Öğlen','Akşam','YÖS','Özel','Diğer')),
        'starting_date' => $faker-> dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'end_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '1 years')
    ];
});
