<?php

namespace App;
use App\Classroom;
use App\Person;
use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function person()
    {
        return $this->hasMany('App\Person');
    }

    public function starting_date(){
        $formatted_date = date('d-m-Y' , strtotime($this->starting_date));
        return $formatted_date;
    }

    public function starting_date_2(){
        $formatted_date = date('Y-m-d' , strtotime($this->starting_date));
        return $formatted_date;
    }

    public function end_date(){
        $formatted_date = date('d-m-Y' , strtotime($this->end_date));
        return $formatted_date;
    }

    public function end_date_2(){
        $formatted_date = date('Y-m-d' , strtotime($this->end_date));
        return $formatted_date;
    }

    public function teacher_name(){
        if(isset($this->teacher_id)){
            $teacher=Person::find($this->teacher_id);
            return $teacher->name;
        } else {
            return null;
        }
    }
}
