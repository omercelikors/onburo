<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use App\Person;
use App\Classroom;

class PassiveStudent extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'student:passive';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'make passive of student controlling weekly';

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
        $students=Person::whereNotNull('classroom_id')->get();
        $classrooms=Classroom::all();
        date_default_timezone_set('Europe/Istanbul');
        $current_date=date("d.m.Y");
        foreach($students as $student){
            if(strtotime($current_date) > strtotime($student->classroom->end_date())){
                $student->taken_courses=$student->taken_courses."  ".$student->classroom->course_type;
                $student->join_status='Pasif';
                $student->classroom_id=null;
                $student->save();
            }
        }
        foreach($classrooms as $classroom){
            if(strtotime($current_date) > strtotime($classroom->end_date())){
                $classroom->delete();
            }
        }
        $this->info('related students make passive and related classrooms make deleted');
    }
}
