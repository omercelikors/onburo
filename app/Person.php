<?php

namespace App;

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

}
