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
        $students=App\Person::whereNotNull('classroom_id')->get();
        factory(App\Payment::class, $students->count())->create();
    }
}
