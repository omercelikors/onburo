<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Agency extends Model
{
    public function person()
    {
        return $this->hasMany('App\Person');
    }
}
