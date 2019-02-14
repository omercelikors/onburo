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
            $starting_date=$request->input('starting_date');
            $starting_date=date('Y-m-d H:i:s' , strtotime($starting_date));
            $end_date=$request->input('end_date');
            $end_date=date('Y-m-d H:i:s' , strtotime($end_date));
            $time=$request->input('time');
            $teacher_id=$request->input('teacher_id');
            
            $classroom=new Classroom;
            $classroom->course_type=$course_type;
            $classroom->starting_date=$starting_date;
            $classroom->end_date=$end_date;
            $classroom->time=$time;
            $classroom->teacher_id=$teacher_id;
            $classroom->save();
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
            $starting_date=$request->input('starting_date');
            $starting_date=date('Y-m-d H:i:s' , strtotime($starting_date));
            $classroom->starting_date=$starting_date;
            $end_date=$request->input('end_date');
            $end_date=date('Y-m-d H:i:s' , strtotime($end_date));
            $classroom->end_date=$end_date;
            $classroom->time=$request->input('time');
            $classroom->teacher_id=$request->input('teacher_id');
            $classroom->save();
            return redirect('/classroom-info-show');
    }

    public function classroom_delete(Request $request){
            $classroom_id=$request->input('id');
            $classroom = Classroom::find($classroom_id);
            $students=Person::where('classroom_id',$classroom_id)->get();
            foreach($students as $student){
                $student->classroom_id=null;
                $student->join_status="Pasif";
                $student->save();
            }
            $classroom->delete();
    }
}
