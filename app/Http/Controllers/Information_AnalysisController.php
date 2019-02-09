<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
class Information_AnalysisController extends Controller
{
    public function payment_analysis_show(){
        date_default_timezone_set("Europe/Istanbul");
        $current_month=date("m");
        $payments=Payment::all();
        $expected_total_for_this_month_tl=0;
        $expected_total_for_this_month_dl=0;
        $open = simplexml_load_file('http://www.tcmb.gov.tr/kurlar/today.xml');
        $usd = $open->Currency[0]->BanknoteSelling;
        $payments_number=count($payments);
        $total_debt_amount=0;
        
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
                    $expected_total_for_this_month_tl+=$installment1_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment1_remaining_amount;
                }
            }
            if($installment3_date_month==$current_month && $installment3_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment1_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment1_remaining_amount;
                }
            }
            if($installment4_date_month==$current_month && $installment4_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment1_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment1_remaining_amount;
                }
            }
            if($installment5_date_month==$current_month && $installment5_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment1_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment1_remaining_amount;
                }
            }
            if($installment6_date_month==$current_month && $installment6_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_this_month_tl+=$installment1_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_this_month_dl+=$installment1_remaining_amount;
                }
            }

            if($payment->currency_unit=="Türk Lirası"){
                $total_debt_amount+=$debt_amount;
            } else if($payment->currency_unit=="Dolar"){
                $total_debt_amount+=($debt_amount*$usd);
            }
        }
        $average_gain=$total_debt_amount/$payments_number;
        return view('information_analysis.payment')->with('expected_total_for_this_month_tl',$expected_total_for_this_month_tl)->with('expected_total_for_this_month_dl',$expected_total_for_this_month_dl)->with('average_gain',$average_gain);
    }

    public function payment_analysis_calculate(Request $request){
        $expected_start_date=$request->input("expected_start_date");
        $expected_end_date=$request->input("expected_end_date");
        $gain_start_date=$request->input("gain_start_date");
        $gain_end_date=$request->input("gain_end_date");
        $expected_start_date_in_time=strtotime($expected_start_date);
        $expected_end_date_in_time=strtotime($expected_end_date);
        $gain_start_date_in_time=strtotime($gain_start_date);
        $gain_end_date_in_time=strtotime($gain_end_date);
        $expected_total_for_between_tl=0;
        $expected_total_for_between_dl=0;
        $gain_total_for_between_tl=0;
        $gain_total_for_between_dl=0;
        $payments=Payment::all();
        foreach($payments as $payment){
            $installment1_date_in_time=strtotime($payment->installment1_date);
            $installment2_date_in_time=strtotime($payment->installment2_date);
            $installment3_date_in_time=strtotime($payment->installment3_date);
            $installment4_date_in_time=strtotime($payment->installment4_date);
            $installment5_date_in_time=strtotime($payment->installment5_date);
            $installment6_date_in_time=strtotime($payment->installment6_date);
            $cash_paid_amount_date_in_time=strtotime($payment->cash_paid_amount_date);
            $installment1_remaining_amount=$payment->installment1_remaining_amount;
            $installment2_remaining_amount=$payment->installment2_remaining_amount;
            $installment3_remaining_amount=$payment->installment3_remaining_amount;
            $installment4_remaining_amount=$payment->installment4_remaining_amount;
            $installment5_remaining_amount=$payment->installment5_remaining_amount;
            $installment6_remaining_amount=$payment->installment6_remaining_amount;
            $cash_paid_amount=$payment->cash_paid_amount;
            $installment1_paid_amount=$payment->installment1_paid_amount;
            $installment2_paid_amount=$payment->installment2_paid_amount;
            $installment3_paid_amount=$payment->installment3_paid_amount;
            $installment4_paid_amount=$payment->installment4_paid_amount;
            $installment5_paid_amount=$payment->installment5_paid_amount;
            $installment6_paid_amount=$payment->installment6_paid_amount;

            if($expected_start_date_in_time<=$installment1_date_in_time && $expected_end_date_in_time>=$installment1_date_in_time && $installment1_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_between_tl+=$installment1_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_between_dl+=$installment1_remaining_amount;
                }
            }

            if($expected_start_date_in_time<=$installment2_date_in_time && $expected_end_date_in_time>=$installment2_date_in_time && $installment2_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_between_tl+=$installment2_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_between_dl+=$installment2_remaining_amount;
                }
            }

            if($expected_start_date_in_time<=$installment3_date_in_time && $expected_end_date_in_time>=$installment3_date_in_time && $installment3_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_between_tl+=$installment3_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_between_dl+=$installment3_remaining_amount;
                }
            }

            if($expected_start_date_in_time<=$installment4_date_in_time && $expected_end_date_in_time>=$installment4_date_in_time && $installment4_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_between_tl+=$installment4_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_between_dl+=$installment4_remaining_amount;
                }
            }

            if($expected_start_date_in_time<=$installment5_date_in_time && $expected_end_date_in_time>=$installment5_date_in_time && $installment5_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_between_tl+=$installment5_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_between_dl+=$installment5_remaining_amount;
                }
            }

            if($expected_start_date_in_time<=$installment6_date_in_time && $expected_end_date_in_time>=$installment6_date_in_time && $installment6_remaining_amount!=0){
                if($payment->currency_unit=="Türk Lirası"){
                    $expected_total_for_between_tl+=$installment6_remaining_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $expected_total_for_between_dl+=$installment6_remaining_amount;
                }
            }

            if($gain_start_date_in_time<=$installment1_date_in_time && $gain_end_date_in_time>=$installment1_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $gain_total_for_between_tl+=$installment1_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $gain_total_for_between_dl+=$installment1_paid_amount;
                }
            }

            if($gain_start_date_in_time<=$installment2_date_in_time && $gain_end_date_in_time>=$installment2_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $gain_total_for_between_tl+=$installment2_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $gain_total_for_between_dl+=$installment2_paid_amount;
                }
            }

            if($gain_start_date_in_time<=$installment3_date_in_time && $gain_end_date_in_time>=$installment3_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $gain_total_for_between_tl+=$installment3_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $gain_total_for_between_dl+=$installment3_paid_amount;
                }
            }

            if($gain_start_date_in_time<=$installment4_date_in_time && $gain_end_date_in_time>=$installment4_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $gain_total_for_between_tl+=$installment4_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $gain_total_for_between_dl+=$installment4_paid_amount;
                }
            }

            if($gain_start_date_in_time<=$installment5_date_in_time && $gain_end_date_in_time>=$installment5_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $gain_total_for_between_tl+=$installment5_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $gain_total_for_between_dl+=$installment5_paid_amount;
                }
            }

            if($gain_start_date_in_time<=$installment6_date_in_time && $gain_end_date_in_time>=$installment6_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $gain_total_for_between_tl+=$installment6_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $gain_total_for_between_dl+=$installment6_paid_amount;
                }
            }

            if($gain_start_date_in_time<=$cash_paid_amount_date_in_time && $gain_end_date_in_time>=$cash_paid_amount_date_in_time){
                if($payment->currency_unit=="Türk Lirası"){
                    $gain_total_for_between_tl+=$cash_paid_amount;
                } else if($payment->currency_unit=="Dolar"){
                    $gain_total_for_between_dl+=$cash_paid_amount;
                }
            }
        }
        return redirect()->back()->with('expected_total_for_between_tl',$expected_total_for_between_tl)->with('expected_total_for_between_dl',$expected_total_for_between_dl)->with('expected_start_date',$expected_start_date)->with('expected_end_date',$expected_end_date)->with('gain_total_for_between_tl',$gain_total_for_between_tl)->with('gain_total_for_between_dl',$gain_total_for_between_dl)->with('gain_start_date',$gain_start_date)->with('gain_end_date',$gain_end_date);
    }

    public function register_analysis_show(){
        return view('information_analysis.register');
    }

    public function personal_communication_dynamic_analysis_show(){
        return view('information_analysis.p_c_d');
    }
}
