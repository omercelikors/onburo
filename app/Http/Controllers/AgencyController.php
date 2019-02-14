<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Agency;
use App\Person;
use Auth;
class AgencyController extends Controller
{
    public function agency_info_show (){
        $agencies=Agency::all();
        return view('agency.info')->with('agencies',$agencies);
    }

    public function agency_register_show (){
        return view('agency.register');
    }

    public function agency_register (Request $request){
            $name=$request->input('name');
            $note=$request->input('note');
            $agency=new Agency;
            $agency->name=$name;
            $agency->note=$note;
            $agency->save();
            return redirect('/agency-info-show');
    }

    public function agency_edit_show ($agency_id){
        $agency= Agency::find($agency_id);
        return view('agency.edit')->with('agency',$agency);
    }

    public function agency_edit_register (Request $request){
            $agency_id=$request->input('agency_id');
            $agency=Agency::find($agency_id);
            $agency->name=$request->input('name');
            $agency->note=$request->input('note');
            $agency->save();
            return redirect('/agency-info-show');
    }

    public function agency_delete(Request $request){
            $agency_id=$request->input('id');
            $agency = Agency::find($agency_id);
            $students=Person::where('agency_id',$agency_id)->get();
            foreach($students as $student){
                $student->agency_id=null;
                $student->save();
            }
            $agency->delete();
    }
}
