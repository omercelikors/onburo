<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
class PaymentController extends Controller
{
    public function payment_show (){
        $payments=Payment::all();
        return view('payment.info')->with('payments',$payments);
    }
}
