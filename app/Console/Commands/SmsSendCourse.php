<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Classroom;
use App\Person;
class SmsSendCourse extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'sms:course';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'send sms for A1 and A2 courses students one week ago before course not finishing';

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

        $A1classrooms=Classroom::where('course_type','A1')->get();
        $A1student_telephones=[];
        foreach($A1classrooms as $A1classroom){
            $A1end_date=$A1classroom->end_date;
            $A1end_date_in_time=strtotime($A1end_date);
            $rest=$A1end_date_in_time-$current_date_in_time;
            $one_week=86400*7;
            if($rest==$one_week){
                foreach($A1classroom->person as $student){
                    array_push($A1student_telephones,$student->telephone);
                }
            }
        }

        $A2classrooms=Classroom::where('course_type','A2')->get();
        $A2student_telephones=[];
        foreach($A2classrooms as $A2classroom){
            $A2end_date=$A2classroom->end_date;
            $A2end_date_in_time=strtotime($A2end_date);
            $rest=$A2end_date_in_time-$current_date_in_time;
            $one_week=86400*7;
            if($rest==$one_week){
                foreach($A2classroom->person as $student){
                    array_push($A2student_telephones,$student->telephone);
                }
            }
        }
        $text="Deneme yazı.";
        $originator="Deneme originator";
        $A1A2students_telephones=array_merge($A1student_telephones,$A2student_telephones);
        $send = Mutlucell::sendBulk($A1A2students_telephones, $text,'', $originator);
        var_dump(Mutlucell::parseOutput($send));
    }
}
