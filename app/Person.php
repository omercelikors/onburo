<?php

namespace App;

use App\Classroom;
use Illuminate\Database\Eloquent\Model;

class Person extends Model
{
    public function classroom()
    {
        return $this->belongsTo('App\Classroom');
    }

    public function message()
    {
        return $this->hasMany('App\Message');
    }

    public function payment()
    {
        return $this->hasMany('App\Payment');
    }

    public function birthdate(){
        $formatted_date = date('Y-m-d' , strtotime($this->birthdate));
        return $formatted_date;
    }

    public function birthdate_2(){
        $formatted_date = date('d-m-Y' , strtotime($this->birthdate));
        return $formatted_date;
    }
}
