<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Agency;
use Debugbar;
use Auth;
use App\Person;
class PaymentController extends Controller
{
    public function payment_info_show (){
        $payments=Payment::orderBy('id', 'desc')->get();
        return view('payment.info')->with('payments',$payments);
    }

    public function payment_edit_show ($payment_id){
        $payment=Payment::find($payment_id);
        $student_name=$payment->person->name;
        $student_surname=$payment->person->surname;
        if(isset($payment->agency)){
            $agency_name=$payment->agency->name;
        } else {
            $agency_name=null;
        }
        return view('payment.edit')->with('payment',$payment)->with('student_name',$student_name)->with('student_surname',$student_surname)->with('agency_name',$agency_name);
    }

    public function payment_delete(Request $request){
            $payment_id=$request->input('id');
            $payment = Payment::find($payment_id);
            $payment->delete();
            return "success";
    }

    public function payment_register_show ($button_register){
        $students=Person::where('status','Öğrenci')->get();
        return view('payment.register')->with('students',$students)->with('button_register',$button_register);
    }

    public function payment_register (Request $request){
            $person_id=$request->input('name');
            $agency_id=$request->input('agency_id');
            $agency_debt_amount=$request->input('agency_debt_amount');
            $agency_paid_amount=$request->input('agency_paid_amount');
            $agency=Agency::where('id',$agency_id)->first();
            if(isset($agency)){
                $agency->debt_amount=($agency->debt_amount)+$agency_debt_amount;
                $agency->paid_amount=($agency->paid_amount)+$agency_paid_amount;
                $agency->currency_unit=$request->input('currency_unit');
                $agency->save();
            }

            $currency_unit=$request->input('currency_unit');
            $paid_description=$request->input('paid_description');
            $paid_description = implode(',', $paid_description);
            $book_status=$request->input('book_status');
            $debt_amount=$request->input('debt_amount');
            $cash_paid_amount=$request->input('cash_paid_amount');
            $total_remaining_amount=$request->input('total_remaining_amount');
            $installment_number=$request->input('installment_number');

            $installment1_amount=$request->input('installment1_amount');
            $installment1_date=$request->input('installment1_date');
             if($installment1_date!=""){
                $installment1_date=date('Y-m-d' , strtotime($installment1_date));
            } else {
                $installment1_date=null;
            }

            $installment2_amount=$request->input('installment2_amount');
            $installment2_date=$request->input('installment2_date');
            if($installment2_date!=""){
                $installment2_date=date('Y-m-d' , strtotime($installment2_date));
            } else {
                $installment2_date=null;
            }


            $installment3_amount=$request->input('installment3_amount');
            $installment3_date=$request->input('installment3_date');
            if($installment3_date!=""){
                $installment3_date=date('Y-m-d' , strtotime($installment3_date));
            } else {
                $installment3_date=null;
            }

            $installment4_amount=$request->input('installment4_amount');
            $installment4_date=$request->input('installment4_date');
            if($installment4_date!=""){
                $installment4_date=date('Y-m-d' , strtotime($installment4_date));
            } else {
                $installment4_date=null;
            }

            $installment5_amount=$request->input('installment5_amount');
            $installment5_date=$request->input('installment5_date');
            if($installment5_date!=""){
                $installment5_date=date('Y-m-d' , strtotime($installment5_date));
            } else {
                $installment5_date=null;
            }

            $note=$request->input('note');

            $payment=new Payment;
            $payment->person_id=$person_id;
            $payment->agency_id=$agency_id;
            $payment->agency_debt_amount=$agency_debt_amount;
            $payment->agency_paid_amount=$agency_paid_amount;
            $payment->currency_unit=$currency_unit;
            $payment->paid_description=$paid_description;
            $payment->book_status=$book_status;
            $payment->debt_amount=$debt_amount;
            $payment->cash_paid_amount=$cash_paid_amount;
            $payment->total_remaining_amount=$total_remaining_amount;
            $payment->installment_number=$installment_number;

            $payment->installment1_amount=$installment1_amount;
            $payment->installment1_remaining_amount=$installment1_amount;
            $payment->installment1_date=$installment1_date;

            $payment->installment2_amount=$installment2_amount;
            $payment->installment2_remaining_amount=$installment2_amount;
            $payment->installment2_date=$installment2_date;

            $payment->installment3_amount=$installment3_amount;
            $payment->installment3_remaining_amount=$installment3_amount;
            $payment->installment3_date=$installment3_date;

            $payment->installment4_amount=$installment4_amount;
            $payment->installment4_remaining_amount=$installment4_amount;
            $payment->installment4_date=$installment4_date;

            $payment->installment5_amount=$installment5_amount;
            $payment->installment5_remaining_amount=$installment5_amount;
            $payment->installment5_date=$installment5_date;

            $payment->note= $note;
            $payment->save();
            return redirect('/payment-info-show');
    }

    public function payment_edit_register (Request $request){

            $payment_id=$request->input('payment_id');
            $payment=Payment::find($payment_id);

            $agency=Agency::where('id',$payment->agency_id)->first();
            if($agency) {
                 //düzenle sayfasındaki acente borç ve ödenen miktarda değişiklik yapıldıysa
                if($payment->agency_debt_amount!=$request->input('agency_debt_amount')){
                    $agency->debt_amount=($agency->debt_amount)-($payment->agency_debt_amount)+($request->input('agency_debt_amount'));
                }
                if($payment->agency_paid_amount!=$request->input('agency_paid_amount')){
                    $agency->paid_amount=($agency->paid_amount)-($payment->agency_paid_amount)+($request->input('agency_paid_amount'));
                }
                $agency->currency_unit=$request->input('currency_unit');
                $agency->save();
            }


            $payment->agency_debt_amount=$request->input('agency_debt_amount');
            $payment->agency_paid_amount=$request->input('agency_paid_amount');
            $payment->currency_unit=$request->input('currency_unit');
            $paid_description=$request->input('paid_description');
            $payment->paid_description=implode(',', $paid_description);
            $payment->book_status=$request->input('book_status');
            $payment->debt_amount=$request->input('debt_amount');
            $payment->cash_paid_amount=$request->input('cash_paid_amount');
            $payment->total_remaining_amount=$request->input('total_remaining_amount');
            $payment->installment_number=$request->input('installment_number');

            $payment->installment1_amount=$request->input('installment1_amount');
            $payment->installment1_paid_amount=$request->input('installment1_paid_amount');
            $payment->installment1_remaining_amount=$request->input('installment1_remaining_amount');
            $installment1_date=$request->input('installment1_date');
            if($installment1_date!=""){
                $installment1_date=date('Y-m-d' , strtotime($installment1_date));
            } else {
                $installment1_date=null;
            }
            $payment->installment1_date=$installment1_date;

            $payment->installment2_amount=$request->input('installment2_amount');
            $payment->installment2_paid_amount=$request->input('installment2_paid_amount');
            $payment->installment2_remaining_amount=$request->input('installment2_remaining_amount');
            $installment2_date=$request->input('installment2_date');
            if($installment2_date!=""){
                $installment2_date=date('Y-m-d' , strtotime($installment2_date));
            } else {
                $installment2_date=null;
            }
            $payment->installment2_date=$installment2_date;

            $payment->installment3_amount=$request->input('installment3_amount');
            $payment->installment3_paid_amount=$request->input('installment3_paid_amount');
            $payment->installment3_remaining_amount=$request->input('installment3_remaining_amount');
            $installment3_date=$request->input('installment3_date');
            if($installment3_date!=""){
                $installment3_date=date('Y-m-d' , strtotime($installment3_date));
            } else {
                $installment3_date=null;
            }
            $payment->installment3_date=$installment3_date;

            $payment->installment4_amount=$request->input('installment4_amount');
            $payment->installment4_paid_amount=$request->input('installment4_paid_amount');
            $payment->installment4_remaining_amount=$request->input('installment4_remaining_amount');
            $installment4_date=$request->input('installment4_date');
            if($installment4_date!=""){
                $installment4_date=date('Y-m-d' , strtotime($installment4_date));
            } else {
                $installment4_date=null;
            }
            $payment->installment4_date=$installment4_date;

            $payment->installment5_amount=$request->input('installment5_amount');
            $payment->installment5_paid_amount=$request->input('installment5_paid_amount');
            $payment->installment5_remaining_amount=$request->input('installment5_remaining_amount');
            $installment5_date=$request->input('installment5_date');
            if($installment5_date!=""){
                $installment5_date=date('Y-m-d' , strtotime($installment5_date));
            } else {
                $installment5_date=null;
            }
            $payment->installment5_date=$installment5_date;

            $payment->note= $request->input('note');
            $payment->save();
            return redirect('/payment-info-show');
    }
}
