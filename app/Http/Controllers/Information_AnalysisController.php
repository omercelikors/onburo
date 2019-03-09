<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Payment;
use App\Classroom;
use App\Person;
use DateTimeZone;
use DateTime;
use App\CourseStudentNumber;

class Information_AnalysisController extends Controller
{
    public function all_analysis_show(){
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
            $cash_paid_amount_date_in_time=strtotime($payment->created_at);
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

    public function course_student_number_show(){
        $course_student_number=CourseStudentNumber::find(1);
        return view('information_analysis.course_student_number')->with('course_student_number',$course_student_number);
    }

    public function age_country_show(){
        $students=Person::where('status','Öğrenci')->get();
        return view('information_analysis.age_country')->with('students',$students);
    }

    public function heard_by_show(){
        $students=Person::where('status','Öğrenci')->get();
        return view('information_analysis.heard_by')->with('students',$students);
    }

    public function abandon_show(){
        $students=Person::where('status','Öğrenci')->get();
        return view('information_analysis.abandon')->with('students',$students);
    }

    public function population_time_show(){
        $students=Person::where('status','Öğrenci')->get();
        $_1month=0;
        $_2month=0;
        $_3month=0;
        $_4month=0;
        $_5month=0;
        $_6month=0;
        $_7month=0;
        $_8month=0;
        $_9month=0;
        $_10month=0;
        $_11month=0;
        $_12month=0;
        foreach($students as $student){
            $dt =$student->created_at->setTimezone(new DateTimeZone('Europe/Istanbul'));
            $month=date('m',strtotime($dt));
            if($month=="01"){
                $_1month ++;
            }else if($month=="02"){
                $_2month ++;
            }else if($month=="03"){
                $_3month ++;
            }else if($month=="04"){
                $_4month ++;
            }else if($month=="05"){
                $_5month ++;
            }else if($month=="06"){
                $_6month ++;
            }else if($month=="07"){
                $_7month ++;
            }else if($month=="08"){
                $_8month ++;
            }else if($month=="09"){
                $_9month ++;
            }else if($month=="10"){
                $_10month ++;
            }else if($month=="11"){
                $_11month ++;
            }else if($month=="12"){
                $_12month ++;
            }
        }
        return view('information_analysis.population_time')->with('_1month',$_1month)->with('_2month',$_2month)->with('_3month',$_3month)->with('_4month',$_4month)->with('_5month',$_5month)->with('_6month',$_6month)->with('_7month',$_7month)->with('_8month',$_8month)->with('_9month',$_9month)->with('_10month',$_10month)->with('_11month',$_11month)->with('_12month',$_12month);
    }
    
    public function age_range_show(){
        $students=Person::where('university_status','Evet')->get();
        return view('information_analysis.age_range')->with('students',$students);
    }
}
