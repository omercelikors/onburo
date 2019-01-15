<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Debugbar;
use Auth;
class PersonController extends Controller
{
    public function student_register (){
        return view('student.register');
    }

    public function student_edit ($student_id){
        $student= Person::find($student_id);
        return view('student.edit')->with('student',$student);
    }

    public function student_delete(Request $request)
    {
        $student_id=$request->input('id');
        $student = Person::find($student_id);
        if(Auth::user()->hasRole('recorder')){
            $student->delete();
            return "success";
        } else {
        return "fail";
        }
    }
}
