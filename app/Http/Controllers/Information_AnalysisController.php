<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class Information_AnalysisController extends Controller
{
    public function information_analysis_show(){
        return view('information_analysis.query');
    }
}
