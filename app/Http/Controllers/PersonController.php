<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Classroom;
use Debugbar;
use Auth;
class PersonController extends Controller
{
    public function student_register_show (){
        $classrooms=Classroom::all();
        return view('student.register')->with('classrooms',$classrooms);
    }

    public function student_edit_show ($student_id){
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

    public function student_register (Request $request) {
        $student_name=$request->input('name');
        $student_birthdate=$request->input('birthdate');
        $student_telephone=$request->input('telephone');
        $student_e_mail=$request->input('e_mail');
        $student_country=$request->input('country');
        $student_language=$request->input('language');
        $student_book_status=$request->input('book_status');
        $student_note=$request->input('note');
        $student_registration_by=Auth::user()->name;
        $student_classroom=$request->input('classrooms');

        $student_register=new Person;
        $student_register->name=$student_name;
        $student_register->status="Öğrenci";
        $student_register->birthdate=$student_birthdate;
        $student_register->telephone=$student_telephone;
        $student_register->e_mail=$student_e_mail;
        $student_register->country=$student_country;
        $student_register->language=$student_language;
        $student_register->book_status=$student_book_status;
        $student_register->note=$student_note;
        $student_register->registration_by=$student_registration_by;
        $student_register->classroom_id=$student_classroom;
        $student_register->save();
        return redirect()->back();


        /* $student_course_type_A1=$request->input('course_type_A1');
        $student_course_type_A2=$request->input('course_type_A2');
        $student_course_type_B1=$request->input('course_type_B1');
        $student_course_type_B2=$request->input('course_type_B2');
        $student_course_type_C1=$request->input('course_type_C1');
        $student_course_type_C1_plus=$request->input('course_type_C1+'); */
    }
}
