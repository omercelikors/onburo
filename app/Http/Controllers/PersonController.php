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
        $student_languages=$request->input('languages');
        $student_languages = implode(',', $student_languages);
        $student_book_status=$request->input('book_status');
        $student_note=$request->input('note');
        $student_registration_by=Auth::user()->name;
        $student_classroom=$request->input('classrooms');
        $student_sex_status=$request->input('sex_status');
        $student_marital_status=$request->input('marital_status');
        $student_university_status=$request->input('university_status');
        $student_university_department=$request->input('university_department');
        $student_relative_university_status=$request->input('relative_university_status');
        $student_relative_name=$request->input('relative_name');
        $student_relative_telephone=$request->input('relative_telephone');
        $student_children_status=$request->input('children_status');
        $student_children_number=$request->input('children_number');
        $student_children_age_range_status=$request->input('children_age_range_status');
        $student_online_lesson_status=$request->input('online_lesson_status');
        $student_citizenship_status=$request->input('citizenship_status');
        $student_home_status=$request->input('home_status');
        $student_heard_by=$request->input('heard_by');
        $student_demanded_education=$request->input('demanded_education');

        $student_register=new Person;
        $student_register->name=$student_name;
        $student_register->status="Öğrenci";
        $student_register->birthdate=$student_birthdate;
        $student_register->telephone=$student_telephone;
        $student_register->e_mail=$student_e_mail;
        $student_register->country=$student_country;
        $student_register->languages=$student_languages;
        $student_register->book_status=$student_book_status;
        $student_register->note=$student_note;
        $student_register->registration_by=$student_registration_by;
        $student_register->classroom_id=$student_classroom;
        $student_register->sex_status=$student_sex_status;
        $student_register->marital_status=$student_marital_status;
        $student_register->university_status=$student_university_status;
        $student_register->university_department=$student_university_department;
        $student_register->relative_university_status=$student_relative_university_status;
        $student_register->relative_name=$student_relative_name;
        $student_register->relative_telephone=$student_relative_telephone;
        $student_register->children_status=$student_children_status;
        $student_register->children_number= $student_children_number;
        $student_register->children_age_range_status=$student_children_age_range_status;
        $student_register->online_lesson_status=$student_online_lesson_status;
        $student_register->citizenship_status=$student_citizenship_status;
        $student_register->home_status=$student_home_status;
        $student_register->heard_by=$student_heard_by;
        $student_register->demanded_education=$student_demanded_education;
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
