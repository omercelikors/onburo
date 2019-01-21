<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Debugbar;
use Auth;
class PaymentController extends Controller
{
    public function payment_info_show (){
        $payments=Payment::all();
        return view('payment.info')->with('payments',$payments);
    }

    public function payment_edit_show ($payment_id){
        $payment=Payment::find($payment_id);
        return view('payment.edit')->with('payment',$payment);
    }

    public function payment_delete(Request $request){
        $payment_id=$request->input('id');
        $payment = Payment::find($payment_id);
        if(Auth::user()->hasRole('recorder')){
            $payment->delete();
            return "success";
        } else {
        return "fail";
        }
    }

    public function payment_register_show (){
        return view('payment.register');
    }
}
