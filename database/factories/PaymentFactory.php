<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
$debt_amount=$faker->randomFloat($nbMaxDecimals = 2, $min = 3000, $max = 5000);
$paid_amount=$faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 2000);
$remaning_amount=$debt_amount - $paid_amount;
$students=App\Person::whereNotNull('classroom_id')->get();
foreach ($students as $student){
    $students_id[]=$student->id;
}
$random_student_id =$faker -> randomElement($students_id);
    return [
        'person_id'=>$random_student_id,
        'debt_amount'=>$debt_amount, 
        'paid_amount'=>$paid_amount,
        'remaining_amount'=>$remaning_amount,
        'currency_unit'=>$faker-> randomElement($array = array ('Türk Lirası','Dolar')),
        'note'=> $faker->optional()->text($maxNbChars = 200)
    ];
});
