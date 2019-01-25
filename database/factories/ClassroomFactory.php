<?php

use Faker\Generator as Faker;

$factory->define(App\Classroom::class, function (Faker $faker) {
    $teachers=App\Person::where('status','Öğretmen')->get();
    foreach($teachers as $teacher){
        $teachers_id[]=$teacher->id;
    }
    $random_teacher_id=$faker ->optional()->randomElement($teachers_id);
    return [
        'teacher_id' => $random_teacher_id,
        'course_type' => $faker ->randomElement($array = array ('A1','A2','B1','B2','C1','C1+')),
        'time' => $faker ->randomElement($array = array ('Sabah','Öğlen','Akşam','YÖS','Özel','Diğer')),
        'starting_date' => $faker-> dateTimeBetween($startDate = '-1 years', $endDate = 'now'),
        'end_date' => $faker->dateTimeBetween($startDate = 'now', $endDate = '1 years')
    ];
});
