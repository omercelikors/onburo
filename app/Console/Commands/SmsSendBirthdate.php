<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Person;
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
        $current_date=date("07.02.2019");
        $current_date_in_time=strtotime($current_date);
        $telephones=[];
        $people=Person::all();
        foreach($people as $person){
            $birthdate=$person->birthdate;
            $birthdate_in_time=strtotime($birthdate);
            if($birthdate_in_time==$current_date_in_time){
                array_push($telephones,$person->telephone);
            }
        }
        $text="Deneme yazı.";
        $originator="Deneme originator";
        $send = Mutlucell::sendBulk($telephones, $text,'', $originator);
        var_dump(Mutlucell::parseOutput($send));
    }
}
