<?php

use Faker\Generator as Faker;

$factory->define(App\Person::class, function (Faker $faker) {
    /* $statusValues = ['Öğrenci','Aday Öğrenci','Öğretmen','Şirket Çalışanı'];
    $yes_or_noValues = ['Evet','Hayır'];
    $sexValues = ['Erkek','Kız'];
    $maritalValues = ['Evli','Bekar'];
    $children_age_rangeValues = ['yaş 0-10','yaş 10-20', 'yaş 20-30']; */
    $status = $faker ->randomElement($array = array ('Öğrenci','Aday Öğrenci','Öğretmen','Şirket Çalışanı'));
    
    if ($status=="Öğrenci"){
        
        $classroom_id = $faker -> unique()->numberBetween($min = 1, $max = 50);
        
    } else {
        $classroom_id = null;
    }

    return [
        'classroom_id' => $classroom_id,
        'name' => $faker->name,
        'status' => $status,
        'birthdate' => $faker->date($format = 'Y-m-d', $max = 'now'),
        'telephone' => $faker->tollFreePhoneNumber,
        'e_mail' => $faker->email,
        'nationality' => $faker->country,
        'language' => $faker->optional()->languageCode,
        'book_status' =>$faker-> randomElement($array = array ('Evet','Hayır')),
        'note' => $faker->optional()->text($maxNbChars = 200),
        'registration_by' => $faker->name,
        'sex' => $faker ->optional()->randomElement($array = array ('Erkek','Kız')),
        'marital_status' => $faker ->optional()->randomElement($array = array ('Evli','Bekar')),
        'university_status' =>$faker-> optional()->randomElement($array = array ('Evet','Hayır')),
        'university_department' => $faker->optional()-> text($maxNbChars = 15),
        'relative_university_status' =>$faker->optional()->randomElement($array = array ('Evet','Hayır')),
        'relative_name' => $faker->optional()->name,
        'relative_telephone' => $faker->optional()->tollFreePhoneNumber,
        'children_status' =>$faker-> optional()->randomElement($array = array ('Evet','Hayır')),
        'children_number' => $faker-> optional()->numberBetween($min = 1, $max = 20),
        'children_age_range' => $faker ->optional()->randomElement($array = array ('0-10 Yaş','10-20 Yaş','20-30 Yaş')),
        'online_lesson_status'  => $faker-> optional()->randomElement($array = array ('Evet','Hayır')),
        'citizenship_status' => $faker-> optional()->randomElement($array = array ('Evet','Hayır')),
        'home_status' => $faker-> optional()->randomElement($array = array ('Evet','Hayır')),
        'heard_by' => $faker->optional()-> text($maxNbChars = 10),
        'demanded_education' => $faker->optional()-> text($maxNbChars = 10)

    ];
});
