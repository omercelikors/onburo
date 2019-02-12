<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Person;

class BirthdateRefresh extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'birthdate:refresh';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'every year refresh birthdate of students';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $students=Person::where('status','Öğrenci')->get();
        foreach($students as $student){
            $birthdate=$student->birthdate;
            $birthdate_in_time=strtotime($birthdate);
            date_default_timezone_set("Europe/Istanbul");
            $current_date=date("d.m.Y");
            $current_date_in_time=strtotime($current_date);
            $age_in_time=$current_date_in_time-$birthdate_in_time;
            $age_in_year=$age_in_time/31536000;
            $student->age=$age_in_year;
            $student->save();
        }
    }
}
