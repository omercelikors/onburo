<?php

namespace App\Console\Commands;


use Illuminate\Console\Command;
use App\Person;
use App\Message;
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
        $current_date=date("07.02.2019");
        $current_date_in_time=strtotime($current_date);
        $telephones=[];
        $people_id=[];
        $people=Person::all();
        foreach($people as $person){
            $birthdate=$person->birthdate;
            $birthdate_in_time=strtotime($birthdate);
            if($birthdate_in_time==$current_date_in_time){
                array_push($telephones,$person->telephone);
                array_push($people_id,$person->id);
            }
        }
        $text="Doğum günü";
        $originator="TSC-YOS";
        $send = Mutlucell::sendBulk($telephones, $text,'', $originator);
        var_dump(Mutlucell::parseOutput($send));
        $people_id_length=count($people_id);
        if(Mutlucell::getStatus($send)) {
            $send_datetime=date("Y-m-d H:i");
            for($i=0;$i<$people_id_length;$i++){
                $message=new Message;
                $message->person_id=$people_id[$i];
                $message->originator=$originator;
                $message->type="SMS";
                $message->text=$text;
                $message->send_datetime=$send_datetime;
                $message->save();
            }
        }
    }
}
