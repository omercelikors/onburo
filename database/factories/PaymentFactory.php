<?php

use Faker\Generator as Faker;

$factory->define(App\Payment::class, function (Faker $faker) {
    
$students=App\Person::where('status','Öğrenci')->get();
foreach ($students as $student){
    $students_id[]=$student->id;
}
$random_student_id =$faker -> randomElement($students_id);

$debt_amount=$faker->randomFloat($nbMaxDecimals = 2, $min = 3000, $max = 5000);
$paid_amount=$faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 2000);
$total_remaining_amount=$debt_amount - $paid_amount;
$installment_number=$faker-> numberBetween($min = 1, $max = 6);
$installment1_amount=$total_remaining_amount/$installment_number;
$installment2_amount=$total_remaining_amount/$installment_number;
$installment3_amount=$total_remaining_amount/$installment_number;
$installment4_amount=$total_remaining_amount/$installment_number;
$installment5_amount=$total_remaining_amount/$installment_number;
$installment6_amount=$total_remaining_amount/$installment_number;
$date1=$faker->dateTimeInInterval($startDate = 'now', $interval = '+ 20 days');
$date2=$faker->dateTimeInInterval($startDate = $date1, $interval = '+ 20 days');
$date3=$faker->dateTimeInInterval($startDate = $date2, $interval = '+ 20 days');
$date4=$faker->dateTimeInInterval($startDate = $date3, $interval = '+ 20 days');
$date5=$faker->dateTimeInInterval($startDate = $date4, $interval = '+ 20 days');
$date6=$faker->dateTimeInInterval($startDate = $date5, $interval = '+ 20 days');
    if($installment_number==1){
        $installment2_amount=null;
        $installment3_amount=null;
        $installment4_amount=null;
        $installment5_amount=null;
        $installment6_amount=null;
        $date2=null;
        $date3=null;
        $date4=null;
        $date5=null;
        $date6=null;
    } else if($installment_number==2){
        $installment3_amount=null;
        $installment4_amount=null;
        $installment5_amount=null;
        $installment6_amount=null;
        $date3=null;
        $date4=null;
        $date5=null;
        $date6=null;
    } else if($installment_number==3){
        $installment4_amount=null;
        $installment5_amount=null;
        $installment6_amount=null;
        $date4=null;
        $date5=null;
        $date6=null;
    } else if($installment_number==4){
        $installment5_amount=null;
        $installment6_amount=null;
        $date5=null;
        $date6=null;
    } else if($installment_number==5){
        $installment6_amount=null;
        $date6=null;
    }
    return [
        'person_id'=>$random_student_id,
        'currency_unit'=>$faker-> randomElement($array = array ('Türk Lirası','Dolar')),
        'debt_amount'=>$debt_amount, 
        'paid_amount'=>$paid_amount,
        'total_remaining_amount'=>$total_remaining_amount,
        'installment_number' =>$installment_number,
        'installment1_amount' =>$installment1_amount,
        'installment1_paid_amount' =>null,
        'installment1_date' =>$date1,
        'installment2_amount' =>$installment2_amount,
        'installment2_paid_amount' =>null,
        'installment2_date' =>$date2,
        'installment3_amount' =>$installment3_amount,
        'installment3_paid_amount' =>null,
        'installment3_date' =>$date3,
        'installment4_amount' =>$installment4_amount,
        'installment4_paid_amount' =>null,
        'installment4_date' =>$date4,
        'installment5_amount' =>$installment5_amount,
        'installment5_paid_amount' =>null,
        'installment5_date' =>$date5,
        'installment6_amount' =>$installment6_amount,
        'installment6_paid_amount' =>null,
        'installment6_date' =>$date6,
        'note'=> $faker->optional()->text($maxNbChars = 200)
    ];
});
