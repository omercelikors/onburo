<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mutlucell;
use App\Person;
class MessageController extends Controller
{
    public function sms_send_show(){
        $people=Person::all();
        return view('sms_email.filter')->with('people',$people);
    }

    public function sms_send(Request $request){
        $originator=$request->input("originator");
        $send_datetime=$request->input("send_datetime");
        $send_datetime=date('Y-m-d H:i' , strtotime($send_datetime));
        $text=$request->input("text");
        $people_id=$request->input("people_id");
        $people_id = implode(',', $people_id);
        $people_id_array= explode(',', $people_id);
        $people_id_array_length=count($people_id_array);
        $people_telephone=[];
        for($i=0;$i<$people_id_array_length;$i++){
            array_push($people_telephone,Person::find($people_id_array[$i])->telephone);
        }
        $send = Mutlucell::sendBulk($people_telephone, $text,$send_datetime, $originator);
        var_dump(Mutlucell::parseOutput($send));
        if(Mutlucell::getStatus($send)) {
            $status= 'İşlem Başarılı!';
        } else {
            $status= 'İşlem Başarısız!';
        }
        return redirect('/sms-send-show')->with('status',$status);
    }
}
