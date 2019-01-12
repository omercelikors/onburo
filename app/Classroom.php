<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Classroom extends Model
{
    public function person()
    {
        return $this->hasMany('App\Person');
    }
}
