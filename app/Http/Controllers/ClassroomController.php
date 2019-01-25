<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Person;
use Auth;
class ClassroomController extends Controller
{
    public function classroom_info_show (){
        $classrooms=Classroom::all();
        return view('classroom.info')->with('classrooms',$classrooms);
    }

    public function classroom_register_show (){
        $teachers=Person::where('status','Öğretmen')->get();
        return view('classroom.register')->with('teachers',$teachers);
    }

    public function classroom_register (Request $request){
        $course_type=$request->input('course_type');
        $course_starting_date=$request->input('starting_date');
        $course_end_date=$request->input('end_date');
        $course_time=$request->input('time');
        $course_teacher_id=$request->input('teacher_id');

        $classroom_register=new Classroom;
        $classroom_register->course_type=$course_type;
        $classroom_register->starting_date=$course_starting_date;
        $classroom_register->end_date=$course_end_date;
        $classroom_register->time=$course_time;
        $classroom_register->teacher_id=$course_teacher_id;
        $classroom_register->save();
        return redirect('/classroom-info-show');
    }

    public function classroom_edit_show ($classroom_id){
        $classroom= Classroom::find($classroom_id);
        $teachers=Person::where('status','Öğretmen')->get();
        return view('classroom.edit')->with('classroom',$classroom)->with('teachers',$teachers);
    }

    public function classroom_edit_register (Request $request){
        $classroom_id=$request->input('classroom_id');
        $classroom=Classroom::find($classroom_id);
        $classroom->course_type=$request->input('course_type');
        $classroom->starting_date=$request->input('starting_date');
        $classroom->end_date=$request->input('end_date');
        $classroom->time=$request->input('time');
        $classroom->teacher_id=$request->input('teacher_id');
        $classroom->save();
        return redirect('/classroom-info-show');
    }

    public function classroom_delete(Request $request)
    {
        $classroom_id=$request->input('id');
        $classroom = Classroom::find($classroom_id);
        if(Auth::user()->hasRole('recorder')){
            $classroom->delete();
            return "success";
        } else {
            return "fail";
        }
    }
}
