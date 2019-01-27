<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Person;
use Auth;

class PollingController extends Controller
{
    public function polling_paper_show (){
        $classrooms=Classroom::all();
        $students=Person::whereNotNull('classroom_id')->get();
        return view('polling_paper.polling')->with('classrooms',$classrooms)->with('students',$students);
    }

}
