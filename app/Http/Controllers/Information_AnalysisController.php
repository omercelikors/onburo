<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Classroom;
use DateTimeZone;
class Information_AnalysisController extends Controller
{
    public function all_show(){
        return view('information_analysis.all');
    }

    public function expected_payment_show(){
        return view('information_analysis.expected_payment');
    }

    public function gain_payment_show(){
        return view('information_analysis.gain_payment');
    }

    public function other_installment_show(){
        date_default_timezone_set("Europe/Istanbul");
        $open = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
        $usd = $open->Currency[0]->BanknoteSelling;
        $current_month=date("m");
        $expected_total_for_this_month_tl=0;
        $expected_total_for_this_month_dl=0;
        $total_debt_amount=0;
        $total_students_under_dolar=0;
        $average_gain=0;
        $payments=Payment::all();
        $payments_number=count($payments);
        foreach($payments as $payment){
            $installment1_date_month=date("m",strtotime($payment->installment1_date));
            $installment2_date_month=date("m",strtotime($payment->installment2_date));
            $installment3_date_month=date("m",strtotime($payment->installment3_date));
            $installment4_date_month=date("m",strtotime($payment->installment4_date));
            $installment5_date_month=date("m",strtotime($payment->installment5_date));
            $installment6_date_month=date("m",strtotime($payment->installment6_date));
            $installment1_remaining_amount=$payment->installment1_remaining_amount;
            $installment2_remaining_amount=$payment->installment2_remaining_amount;
            $installment3_remaining_amount=$payment->installment3_remaining_amount;
            $installment4_remaining_amount=$payment->installment4_remaining_amount;
            $installment5_remaining_amount=$payment->installment5_remaining_amount;
            $installment6_remaining_amount=$payment->installment6_remaining_amount;
            $debt_amount=$payment->debt_amount;
            if($installment1_date_month==$current_month && $installment1_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment1_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment1_remaining_amount;
                }
            }
            if($installment2_date_month==$current_month && $installment2_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment2_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment2_remaining_amount;
                }
            }
            if($installment3_date_month==$current_month && $installment3_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment3_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment3_remaining_amount;
                }
            }
            if($installment4_date_month==$current_month && $installment4_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment4_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment4_remaining_amount;
                }
            }
            if($installment5_date_month==$current_month && $installment5_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment5_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment5_remaining_amount;
                }
            }
            if($installment6_date_month==$current_month && $installment6_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment6_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment6_remaining_amount;
                }
            }
            if($payment->currency_unit=="Türk Lirası"){
                $total_debt_amount+=$debt_amount;
            } else if($payment->currency_unit=="Dolar"){
                $total_debt_amount+=($debt_amount*$usd);
            }
            if($payment->currency_unit=="Türk Lirası"){
                $convert_dl=$debt_amount/$usd;
                if($convert_dl<=220){
                    $total_students_under_dolar++;
                }
            }
            if($payment->currency_unit=="Dolar"){
                if($debt_amount<=220){
                    $total_students_under_dolar++;
                }
            }
        }
        if($payments_number!=0){
            $average_gain=number_format($total_debt_amount/$payments_number,2);
        }
        return view('information_analysis.other_installment')->with('expected_total_for_this_month_tl',$expected_total_for_this_month_tl)->with('expected_total_for_this_month_dl',$expected_total_for_this_month_dl)->with('average_gain',$average_gain)->with('total_students_under_dolar',$total_students_under_dolar);
    }
    public function expected_payment_calculate(Request $request){
        $start_date=$request->input("start_date");
        $end_date=$request->input("end_date");
        $start_date_in_time=strtotime($start_date);
        $end_date_in_time=strtotime($end_date);
        $total_for_between_tl=0;
        $total_for_between_dl=0;
        $payments=Payment::all();
        foreach($payments as $payment){
            $installment1_date_in_time=strtotime($payment->installment1_date);
            $installment2_date_in_time=strtotime($payment->installment2_date);
            $installment3_date_in_time=strtotime($payment->installment3_date);
            $installment4_date_in_time=strtotime($payment->installment4_date);
            $installment5_date_in_time=strtotime($payment->installment5_date);
            $installment6_date_in_time=strtotime($payment->installment6_date);
            $installment1_remaining_amount=$payment->installment1_remaining_amount;
            $installment2_remaining_amount=$payment->installment2_remaining_amount;
            $installment3_remaining_amount=$payment->installment3_remaining_amount;
            $installment4_remaining_amount=$payment->installment4_remaining_amount;
            $installment5_remaining_amount=$payment->installment5_remaining_amount;
            $installment6_remaining_amount=$payment->installment6_remaining_amount;
            if($start_date_in_time<=$installment1_date_in_time && $end_date_in_time>=$installment1_date_in_time && $installment1_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment1_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment1_remaining_amount;
                }
            }
            if($start_date_in_time<=$installment2_date_in_time && $end_date_in_time>=$installment2_date_in_time && $installment2_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment2_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment2_remaining_amount;
                }
            }
            if($start_date_in_time<=$installment3_date_in_time && $end_date_in_time>=$installment3_date_in_time && $installment3_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment3_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment3_remaining_amount;
                }
            }
            if($start_date_in_time<=$installment4_date_in_time && $end_date_in_time>=$installment4_date_in_time && $installment4_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment4_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment4_remaining_amount;
                }
            }
            if($start_date_in_time<=$installment5_date_in_time && $end_date_in_time>=$installment5_date_in_time && $installment5_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment5_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment5_remaining_amount;
                }
            }
            if($start_date_in_time<=$installment6_date_in_time && $end_date_in_time>=$installment6_date_in_time && $installment6_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment6_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment6_remaining_amount;
                }
            }
        }
        return redirect()->back()->with('total_for_between_tl',$total_for_between_tl)->with('total_for_between_dl',$total_for_between_dl)->with('start_date',$start_date)->with('end_date',$end_date);
    }
    public function gain_payment_calculate(Request $request){
        $start_date=$request->input("start_date");
        $end_date=$request->input("end_date");
        $start_date_in_time=strtotime($start_date);
        $end_date_in_time=strtotime($end_date);
        $total_for_between_tl=0;
        $total_for_between_dl=0;
        $payments=Payment::all();
        foreach($payments as $payment){
            $installment1_date_in_time=strtotime($payment->installment1_date);
            $installment2_date_in_time=strtotime($payment->installment2_date);
            $installment3_date_in_time=strtotime($payment->installment3_date);
            $installment4_date_in_time=strtotime($payment->installment4_date);
            $installment5_date_in_time=strtotime($payment->installment5_date);
            $installment6_date_in_time=strtotime($payment->installment6_date);
            $cash_paid_amount_date_in_time=strtotime($payment->cash_paid_amount_date);
            $installment1_paid_amount=$payment->installment1_paid_amount;
            $installment2_paid_amount=$payment->installment2_paid_amount;
            $installment3_paid_amount=$payment->installment3_paid_amount;
            $installment4_paid_amount=$payment->installment4_paid_amount;
            $installment5_paid_amount=$payment->installment5_paid_amount;
            $installment6_paid_amount=$payment->installment6_paid_amount;
            $cash_paid_amount=$payment->cash_paid_amount;

            if($start_date_in_time<=$installment1_date_in_time && $end_date_in_time>=$installment1_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment1_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment1_paid_amount;
                }
            }

            if($start_date_in_time<=$installment2_date_in_time && $end_date_in_time>=$installment2_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment2_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment2_paid_amount;
                }
            }

            if($start_date_in_time<=$installment3_date_in_time && $end_date_in_time>=$installment3_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment3_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment3_paid_amount;
                }
            }

            if($start_date_in_time<=$installment4_date_in_time && $end_date_in_time>=$installment4_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment4_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment4_paid_amount;
                }
            }

            if($start_date_in_time<=$installment5_date_in_time && $end_date_in_time>=$installment5_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment5_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment5_paid_amount;
                }
            }

            if($start_date_in_time<=$installment6_date_in_time && $end_date_in_time>=$installment6_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$installment6_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$installment6_paid_amount;
                }
            }

            if($start_date_in_time<=$cash_paid_amount_date_in_time && $end_date_in_time>=$cash_paid_amount_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $total_for_between_tl+=$cash_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $total_for_between_dl+=$cash_paid_amount;
                }
            }
        }
        return redirect()->back()->with('total_for_between_tl',$total_for_between_tl)->with('total_for_between_dl',$total_for_between_dl)->with('start_date',$start_date)->with('end_date',$end_date);
    }

    public function register_analysis_show(){

        return view('information_analysis.register');
    }

    public function register_analysis_calculate(Request $request){
        $classroom_query_start_date=$request->input("classroom_query_start_date");
        $classroom_query_end_date=$request->input("classroom_query_end_date");
        $classroom_query_start_date_in_time=strtotime($classroom_query_start_date);
        $classroom_query_end_date_in_time=strtotime($classroom_query_end_date);
        $classroom_morning_number=0;
        $classroom_afternoon_number=0;
        $classrooms=Classroom::all();
        foreach($classrooms as $classroom){
            $classroom_created_date=$classroom->created_at->setTimezone(new DateTimeZone('Europe/Istanbul'));
            $classroom_created_date_in_time=strtotime($classroom_created_date);
        }
        
        return redirect()->back();
    }

    public function personal_communication_dynamic_analysis_show(){
        return view('information_analysis.p_c_d');
    }

    public function personal_communication_dynamic_analysis_calculate(){
        return redirect()->back();
    }
}
