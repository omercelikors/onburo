<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Information_AnalysisController extends Controller
{
    public function payment_analysis_show(){
        return view('information_analysis.payment');
    }

    public function register_analysis_show(){
        return view('information_analysis.register');
    }

    public function personal_communication_dynamic_analysis_show(){
        return view('information_analysis.p_c_d');
    }
}
