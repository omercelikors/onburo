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
        $a1_courses=Classroom::where('course_type','A1')->get();
        $a2_courses=Classroom::where('course_type','A2')->get();
        $b1_courses=Classroom::where('course_type','B1')->get();
        $b2_courses=Classroom::where('course_type','B2')->get();
        $c1_courses=Classroom::where('course_type','C1')->get();
        $c1_plus_courses=Classroom::where('course_type','C1+')->get();
        $classrooms=Classroom::all();
        return view('student.register')->with('classrooms',$classrooms)->with('a1_courses',$a1_courses)->with('a2_courses',$a2_courses)->with('b1_courses',$b1_courses)->with('b2_courses',$b2_courses)->with('c1_courses',$c1_courses)->with('c1_plus_courses',$c1_plus_courses);
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
        $student_e_mail=$request->input('e_mail');
        $student_telephone=$request->input('telephone');
        $student_birthdate=$request->input('birthdate');
        $student_country=$request->input('country');
        $student_book_status=$request->input('book_status');
        $student_registration_by=Auth::user()->name;

        $student_control=new Person;
        $student_control->name=$student_name;
        $student_control->e_mail=$student_e_mail;
        $student_control->telephone=$student_telephone;
        $student_control->birthdate=$student_birthdate;
        $student_control->country=$student_country;
        $student_control->book_status=$student_book_status;
        $student_control->registration_by=$student_registration_by;
        $student_control->save();
        return redirect()->back();


        /* $student_course_type_A1=$request->input('course_type_A1');
        $student_course_type_A2=$request->input('course_type_A2');
        $student_course_type_B1=$request->input('course_type_B1');
        $student_course_type_B2=$request->input('course_type_B2');
        $student_course_type_C1=$request->input('course_type_C1');
        $student_course_type_C1_plus=$request->input('course_type_C1+'); */
    }
}
