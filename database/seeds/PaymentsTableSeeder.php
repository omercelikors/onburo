<?php

use Illuminate\Database\Seeder;

class PaymentsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $students=App\Person::where('status','Öğrenci')->get();
        factory(App\Payment::class, $students->count()+10)->create();
    }
}