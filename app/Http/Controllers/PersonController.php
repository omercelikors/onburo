<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Payment;
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
        $classrooms=Classroom::all();
        return view('student.edit')->with('student',$student)->with('classrooms',$classrooms);
    }

    public function student_delete(Request $request)
    {
        $student_id=$request->input('id');
        $student = Person::find($student_id);
        if(Auth::user()->hasRole('recorder')){
            $student->delete();
            $student_payments=Payment::where('person_id',$student_id)->delete();
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
        return redirect('/home');
    }

    public function student_edit_register(Request $request){
        $student_id=$request->input('student_id');
        $student=Person::find($student_id);
        $student->name=$request->input('name');
        $student->birthdate=$request->input('birthdate');
        $student->telephone=$request->input('telephone');
        $student->e_mail=$request->input('e_mail');
        $student->country=$request->input('country');
        $student_languages=$request->input('languages');
        $student->languages = implode(',', $student_languages);
        $student->book_status=$request->input('book_status');
        $student->note=$request->input('note');
        $student->registration_by=Auth::user()->name;
        $student->classroom_id=$request->input('classrooms');
        $student->sex_status=$request->input('sex_status');
        $student->marital_status=$request->input('marital_status');
        $student->university_status=$request->input('university_status');
        $student->university_department=$request->input('university_department');
        $student->relative_university_status=$request->input('relative_university_status');
        $student->relative_name=$request->input('relative_name');
        $student->relative_telephone=$request->input('relative_telephone');
        $student->children_status=$request->input('children_status');
        $student->children_number=$request->input('children_number');
        $student->children_age_range_status=$request->input('children_age_range_status');
        $student->online_lesson_status=$request->input('online_lesson_status');
        $student->citizenship_status=$request->input('citizenship_status');
        $student->home_status=$request->input('home_status');
        $student->heard_by=$request->input('heard_by');
        $student->demanded_education=$request->input('demanded_education');
        $student->save();
        return redirect('/home');
    }

    public function candidate_student_info_show (){
        $candidate_students=Person::where('status','Aday Öğrenci')->get();
        return view('candidate_student.info')->with('candidate_students',$candidate_students);
    }

    public function candidate_student_register_show (){
        return view('candidate_student.register');
    }

    public function candidate_student_edit_show ($candidate_student_id){
        $candidate_student= Person::find($candidate_student_id);
        return view('candidate_student.edit')->with('candidate_student',$candidate_student);
    }

    public function candidate_student_delete(Request $request)
    {
        $candidate_student_id=$request->input('id');
        $candidate_student = Person::find($candidate_student_id);
        if(Auth::user()->hasRole('recorder')){
            $candidate_student->delete();
            return "success";
        } else {
        return "fail";
        }
    }
}
