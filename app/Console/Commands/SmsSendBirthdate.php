<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Person;
use Mutlucell;
class SmsSendBirthdate extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:birthdate';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send sms all people for celebrating birthdate';

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
        date_default_timezone_set("Europe/Istanbul");
        $current_date=date("d.m.Y");
        $current_date_in_time=strtotime($current_date);
        $current_day=date("d",$current_date_in_time);
        $current_month=date("m",$current_date_in_time);
        $telephones=[];
        $people=Person::all();
        foreach($people as $person){
            $birthdate=$person->birthdate;
            $birthdate_in_time=strtotime($birthdate);
            $birthdate_day=date("d",$birthdate_in_time);
            $birthdate_month=date("m",$birthdate_in_time);
            if($current_day==$birthdate_day && $current_month==$birthdate_month){
                array_push($telephones,$person->telephone);
            }

        }
        $text="Turkey Study Center ailesi olarak yeni yaşınızı kutlarız. Sevdiklerinizle birlikte sağlıklı, başarılı ve mutlu bir hayat geçirmeniz dileğiyle. Nice mutlu yıllara :) , As the Turkey Study Center family, we celebrate your new age. We wish you a healthy, successful and happy life with your loved ones. Happy Birthday :)";
        $originator="TSC-YOS";
        $send = Mutlucell::sendBulk($telephones, $text,'', $originator);
        var_dump(Mutlucell::parseOutput($send));
    }
}
