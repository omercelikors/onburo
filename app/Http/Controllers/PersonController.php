<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Debugbar;
class PersonController extends Controller
{
    public function student_register (){
        return view('student.register');
    }

    public function student_edit (){
        return view('student.edit');
    }

    public function student_delete(Request $request)
    {
        
        $student_id=$request->input('id');
        $student = Person::find($student_id);
        if(Auth::user()->hasRole('recorder')){
            $student->delete();
            return "success";
        } 
        return "fail";
        
    }
}
