<?php

namespace App;

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

    public function end_date(){
            $formatted_date = date('d-m-Y' , strtotime($this->end_date));
        return $formatted_date;
    }
}
