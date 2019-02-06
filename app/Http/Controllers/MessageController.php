<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mutlucell;
use App\Person;
class MessageController extends Controller
{
    public function test_sms_send_show(){
        return view('sms_email.test');
    }

    public function test_sms_send(Request $request){
        $send = Mutlucell::send('05309469822', 'Merhaba');
        var_dump(Mutlucell::parseOutput($send));
        return view('sms_email.test');
    }

    public function sms_send_show(){
        $people=Person::all();
        return view('sms_email.filter')->with('people',$people);
    }
}
