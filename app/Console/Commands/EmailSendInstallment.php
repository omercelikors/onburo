<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Mailgun\Mailgun;
use App\Payment;
class EmailSendInstallment extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'email:installment';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send email to accounting staff for student installments';

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
        $mailgun_secret=env('MAILGUN_SECRET',false);
        $domain = env('MAILGUN_DOMAIN',false);
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
            
            if($installment1_remaining_amount != 0 && ($rest1_day==$two_days || $installment1_date_in_time==$current_date_in_time)){
                $text="<b>"."Öğrenci Adı:"."</b>"."<b style=color:red;>".$payment->person->name."</b>"." "."<b style=color:red;>".$payment->person->surname."</b>"."<br>"."<b>"."Sınıfı:"."</b>"."<b style=color:red;>".$payment->person->classroom->course_type."</b>"."<br>"."<b>"."Taksit Tutarı:"."</b>"."<b style=color:red;>".$installment1_remaining_amount."</b>"." "."<b style=color:red;>".$currency_unit."</b>"."<br>"."<b>"."Taksit Tarihi:"."</b>"."<b style=color:red;>".$payment->installment_date_format(1)."</b>";
                $mgClient = new Mailgun($mailgun_secret);
                $result = $mgClient->sendMessage("$domain",
                array  ('from'    => 'info@turkeystudycenter.com',
                        'to'      => array('mesud.a@turkeystudycenter.com,fatma.d@turkeystudycenter.com'),
                        'subject' => 'TAKSİT BİLDİRİMİ',
                        'html'    => $text));
            }
            if($installment2_remaining_amount != 0 && ($rest2_day==$two_days || $installment2_date_in_time==$current_date_in_time)){
                $text="<b>"."Öğrenci Adı:"."</b>"."<b style=color:red;>".$payment->person->name."</b>"." "."<b style=color:red;>".$payment->person->surname."</b>"."<br>"."<b>"."Sınıfı:"."</b>"."<b style=color:red;>".$payment->person->classroom->course_type."</b>"."<br>"."<b>"."Taksit Tutarı:"."</b>"."<b style=color:red;>".$installment2_remaining_amount."</b>"." "."<b style=color:red;>".$currency_unit."</b>"."<br>"."<b>"."Taksit Tarihi:"."</b>"."<b style=color:red;>".$payment->installment_date_format(2)."</b>";
                $mgClient = new Mailgun($mailgun_secret);
                $result = $mgClient->sendMessage("$domain",
                array  ('from'    => 'info@turkeystudycenter.com',
                        'to'      => array('mesud.a@turkeystudycenter.com,fatma.d@turkeystudycenter.com'),
                        'subject' => 'TAKSİT BİLDİRİMİ',
                        'html'    => $text));
            }
            if($installment3_remaining_amount != 0 && ($rest3_day==$two_days || $installment3_date_in_time==$current_date_in_time)){
                $text="<b>"."Öğrenci Adı:"."</b>"."<b style=color:red;>".$payment->person->name."</b>"." "."<b style=color:red;>".$payment->person->surname."</b>"."<br>"."<b>"."Sınıfı:"."</b>"."<b style=color:red;>".$payment->person->classroom->course_type."</b>"."<br>"."<b>"."Taksit Tutarı:"."</b>"."<b style=color:red;>".$installment3_remaining_amount."</b>"." "."<b style=color:red;>".$currency_unit."</b>"."<br>"."<b>"."Taksit Tarihi:"."</b>"."<b style=color:red;>".$payment->installment_date_format(3)."</b>";
                $mgClient = new Mailgun($mailgun_secret);
                $result = $mgClient->sendMessage("$domain",
                array  ('from'    => 'info@turkeystudycenter.com',
                        'to'      => array('mesud.a@turkeystudycenter.com,fatma.d@turkeystudycenter.com'),
                        'subject' => 'TAKSİT BİLDİRİMİ',
                        'html'    => $text));
            }
            if($installment4_remaining_amount != 0 && ($rest4_day==$two_days || $installment4_date_in_time==$current_date_in_time)){
                $text="<b>"."Öğrenci Adı:"."</b>"."<b style=color:red;>".$payment->person->name."</b>"." "."<b style=color:red;>".$payment->person->surname."</b>"."<br>"."<b>"."Sınıfı:"."</b>"."<b style=color:red;>".$payment->person->classroom->course_type."</b>"."<br>"."<b>"."Taksit Tutarı:"."</b>"."<b style=color:red;>".$installment4_remaining_amount."</b>"." "."<b style=color:red;>".$currency_unit."</b>"."<br>"."<b>"."Taksit Tarihi:"."</b>"."<b style=color:red;>".$payment->installment_date_format(4)."</b>";
                $mgClient = new Mailgun($mailgun_secret);
                $result = $mgClient->sendMessage("$domain",
                array  ('from'    => 'info@turkeystudycenter.com',
                        'to'      => array('mesud.a@turkeystudycenter.com,fatma.d@turkeystudycenter.com'),
                        'subject' => 'TAKSİT BİLDİRİMİ',
                        'html'    => $text));
            }
            if($installment5_remaining_amount != 0 && ($rest5_day==$two_days || $installment5_date_in_time==$current_date_in_time)){
                $text="<b>"."Öğrenci Adı:"."</b>"."<b style=color:red;>".$payment->person->name."</b>"." "."<b style=color:red;>".$payment->person->surname."</b>"."<br>"."<b>"."Sınıfı:"."</b>"."<b style=color:red;>".$payment->person->classroom->course_type."</b>"."<br>"."<b>"."Taksit Tutarı:"."</b>"."<b style=color:red;>".$installment5_remaining_amount."</b>"." "."<b style=color:red;>".$currency_unit."</b>"."<br>"."<b>"."Taksit Tarihi:"."</b>"."<b style=color:red;>".$payment->installment_date_format(5)."</b>";
                $mgClient = new Mailgun($mailgun_secret);
                $result = $mgClient->sendMessage("$domain",
                array  ('from'    => 'info@turkeystudycenter.com',
                        'to'      => array('mesud.a@turkeystudycenter.com,fatma.d@turkeystudycenter.com'),
                        'subject' => 'TAKSİT BİLDİRİMİ',
                        'html'    => $text));
            }
        }
    }
}
