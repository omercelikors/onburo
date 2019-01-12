<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public function person()
    {
        return $this->belongsTo('App\Person');
    }

    public function installment()
    {
        return $this->hasOne('App\Installment');
    }
}
