<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Payment;
use Mutlucell;
class SmsSendInstallment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:installment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send sms student for their insatllment';

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
        $installments=Payment::all();
        
        foreach($installments as $installment){
            $installment1_date_in_time=strtotime($installment->installment1_date);
            $installment2_date_in_time=strtotime($installment->installment2_date);
            $installment3_date_in_time=strtotime($installment->installment3_date);
            $installment4_date_in_time=strtotime($installment->installment4_date);
            $installment5_date_in_time=strtotime($installment->installment5_date);
            $installment6_date_in_time=strtotime($installment->installment6_date);
            $installment1_remaining_amount=$installment->installment1_remaining_amount;
            $installment2_remaining_amount=$installment->installment2_remaining_amount;
            $installment3_remaining_amount=$installment->installment3_remaining_amount;
            $installment4_remaining_amount=$installment->installment4_remaining_amount;
            $installment5_remaining_amount=$installment->installment5_remaining_amount;
            $installment6_remaining_amount=$installment->installment6_remaining_amount;
            $two_days=2*86400;
            $rest1_day=$installment1_date_in_time-$current_date_in_time;
            $rest2_day=$installment2_date_in_time-$current_date_in_time;
            $rest3_day=$installment3_date_in_time-$current_date_in_time;
            $rest4_day=$installment4_date_in_time-$current_date_in_time;
            $rest5_day=$installment5_date_in_time-$current_date_in_time;
            $rest6_day=$installment6_date_in_time-$current_date_in_time;
            $telephone=$installment->person->telephone;
            $originator="TSC-YOS";
            if($installment1_remaining_amount != 0 && ($rest1_day==$two_days || $installment1_date_in_time==$current_date_in_time)){
                $text="1.taksit-";
                $send = Mutlucell::sendBulk($telephone, $text.$installment1_remaining_amount,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment2_remaining_amount != 0 && ($rest2_day==$two_days || $installment2_date_in_time==$current_date_in_time)){
                $text="2.taksit-";
                $send = Mutlucell::sendBulk($telephone, $text.$installment2_remaining_amount,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment3_remaining_amount != 0 && ($rest3_day==$two_days || $installment3_date_in_time==$current_date_in_time)){
                $text="2.taksit-";
                $send = Mutlucell::sendBulk($telephone, $text.$installment3_remaining_amount,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment4_remaining_amount != 0 && ($rest4_day==$two_days || $installment4_date_in_time==$current_date_in_time)){
                $text="3.taksit-";
                $send = Mutlucell::sendBulk($telephone, $text.$installment4_remaining_amount,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment5_remaining_amount != 0 && ($rest5_day==$two_days || $installment5_date_in_time==$current_date_in_time)){
                $text="4.taksit-";
                $send = Mutlucell::sendBulk($telephone, $text.$installment5_remaining_amount,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment6_remaining_amount != 0 && ($rest6_day==$two_days || $installment6_date_in_time==$current_date_in_time)){
                $text="5.taksit-";
                $send = Mutlucell::sendBulk($telephone, $text.$installment6_remaining_amount,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
        }
    }
}
