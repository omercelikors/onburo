<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use Debugbar;
use Auth;
use App\Person;
class PaymentController extends Controller
{
    public function payment_info_show (){
        $payments=Payment::all();
        return view('payment.info')->with('payments',$payments);
    }

    public function payment_edit_show ($payment_id){
        $payment=Payment::find($payment_id);
        $student_name=$payment->person->name;
        return view('payment.edit')->with('payment',$payment)->with('student_name',$student_name);
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
        $students=Person::where('status','Öğrenci')->get();
        return view('payment.register')->with('students',$students);
    }

    public function payment_register (Request $request){
        $person_id=$request->input('name');
        $currency_unit=$request->input('currency_unit');
        $debt_amount=$request->input('debt_amount');
        $paid_amount=$request->input('paid_amount');
        $total_remaining_amount=$request->input('total_remaining_amount');
        $installment_number=$request->input('installment_number');
        $installment1_amount=$request->input('installment1_amount');
        $installment1_date=$request->input('installment1_date');
        $installment2_amount=$request->input('installment2_amount');
        $installment2_date=$request->input('installment2_date');
        $installment3_amount=$request->input('installment3_amount');
        $installment3_date=$request->input('installment3_date');
        $installment4_amount=$request->input('installment4_amount');
        $installment4_date=$request->input('installment4_date');
        $installment5_amount=$request->input('installment5_amount');
        $installment5_date=$request->input('installment5_date');
        $installment6_amount=$request->input('installment6_amount');
        $installment6_date=$request->input('installment6_date');
        $note=$request->input('note');

        $payment_register=new Payment;
        $payment_register->person_id=$person_id;
        $payment_register->currency_unit=$currency_unit;
        $payment_register->debt_amount=$debt_amount;
        $payment_register->paid_amount=$paid_amount;
        $payment_register->total_remaining_amount=$total_remaining_amount;
        $payment_register->installment_number=$installment_number;
        $payment_register->installment1_amount=$installment1_amount;
        $payment_register->installment1_date=$installment1_date;
        $payment_register->installment2_amount=$installment2_amount;
        $payment_register->installment2_date=$installment2_date;
        $payment_register->installment3_amount=$installment3_amount;
        $payment_register->installment3_date=$installment3_date;
        $payment_register->installment4_amount=$installment4_amount;
        $payment_register->installment4_date=$installment4_date;
        $payment_register->installment5_amount=$installment5_amount;
        $payment_register->installment5_date=$installment5_date;
        $payment_register->installment6_amount=$installment6_amount;
        $payment_register->installment6_date=$installment6_date;
        $payment_register->note= $note;
        $payment_register->save();
        return redirect()->back();
    }
}
