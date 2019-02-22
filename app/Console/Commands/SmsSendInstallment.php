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
    protected $description = 'send sms student for their installment';

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
        $payments=Payment::all();
        
        foreach($payments as $payment){
            $installment1_date_in_time=strtotime($payment->installment1_date);
            $installment2_date_in_time=strtotime($payment->installment2_date);
            $installment3_date_in_time=strtotime($payment->installment3_date);
            $installment4_date_in_time=strtotime($payment->installment4_date);
            $installment5_date_in_time=strtotime($payment->installment5_date);
            $installment6_date_in_time=strtotime($payment->installment6_date);
            $installment1_remaining_amount=$payment->installment1_remaining_amount;
            $installment2_remaining_amount=$payment->installment2_remaining_amount;
            $installment3_remaining_amount=$payment->installment3_remaining_amount;
            $installment4_remaining_amount=$payment->installment4_remaining_amount;
            $installment5_remaining_amount=$payment->installment5_remaining_amount;
            $installment6_remaining_amount=$payment->installment6_remaining_amount;
            $currency_unit=$payment->currency_unit;
            $two_days=2*86400;
            $rest1_day=$installment1_date_in_time-$current_date_in_time;
            $rest2_day=$installment2_date_in_time-$current_date_in_time;
            $rest3_day=$installment3_date_in_time-$current_date_in_time;
            $rest4_day=$installment4_date_in_time-$current_date_in_time;
            $rest5_day=$installment5_date_in_time-$current_date_in_time;
            $rest6_day=$installment6_date_in_time-$current_date_in_time;
            $telephone=$payment->person->telephone;
            $originator="TSC-YOS";
            if($installment1_remaining_amount != 0 && ($rest1_day==$two_days || $installment1_date_in_time==$current_date_in_time)){
                $text=$payment->installment_date_format(1)." tarihinde"." ".$installment1_remaining_amount." ".$currency_unit." tutarında olan taksit gününüz yaklaşmaktadır. Sağlıklı ve mutlu günler dileriz.(Your installment day is approaching. We wish you happy and healthy days)";
                $send = Mutlucell::sendBulk($telephone, $text,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment2_remaining_amount != 0 && ($rest2_day==$two_days || $installment2_date_in_time==$current_date_in_time)){
                $text=$payment->installment_date_format(2)." tarihinde"." ".$installment2_remaining_amount." ".$currency_unit." tutarında olan taksit gününüz yaklaşmaktadır. Sağlıklı ve mutlu günler dileriz.(Your installment day is approaching. We wish you happy and healthy days)";
                $send = Mutlucell::sendBulk($telephone, $text,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment3_remaining_amount != 0 && ($rest3_day==$two_days || $installment3_date_in_time==$current_date_in_time)){
                $text=$payment->installment_date_format(3)." tarihinde"." ".$installment3_remaining_amount." ".$currency_unit." tutarında olan taksit gününüz yaklaşmaktadır. Sağlıklı ve mutlu günler dileriz.(Your installment day is approaching. We wish you happy and healthy days)";
                $send = Mutlucell::sendBulk($telephone, $text,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment4_remaining_amount != 0 && ($rest4_day==$two_days || $installment4_date_in_time==$current_date_in_time)){
                $text=$payment->installment_date_format(4)." tarihinde"." ".$installment4_remaining_amount." ".$currency_unit." tutarında olan taksit gününüz yaklaşmaktadır. Sağlıklı ve mutlu günler dileriz.(Your installment day is approaching. We wish you happy and healthy days)";
                $send = Mutlucell::sendBulk($telephone, $text,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
            if($installment5_remaining_amount != 0 && ($rest5_day==$two_days || $installment5_date_in_time==$current_date_in_time)){
                $text=$payment->installment_date_format(5)." tarihinde"." ".$installment5_remaining_amount." ".$currency_unit." tutarında olan taksit gününüz yaklaşmaktadır. Sağlıklı ve mutlu günler dileriz.(Your installment day is approaching. We wish you happy and healthy days)";
                $send = Mutlucell::sendBulk($telephone, $text,'', $originator);
                var_dump(Mutlucell::parseOutput($send));
            }
        }
    }
}
