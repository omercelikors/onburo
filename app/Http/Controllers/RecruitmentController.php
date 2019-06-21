<?php

namespace App\Http\Controllers;

use App\Recruitment;
use Illuminate\Http\Request;
use App\Agency;
use App\University;
use App\UniversityBranch;
use Auth;

class RecruitmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $recruitments=Recruitment::all();
        return view('recruitment.index',['recruitments'=>$recruitments]);
    }

        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index1()
    {
        $recruitments=Recruitment::all();
        return view('recruitment.index1',['recruitments'=>$recruitments]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $agencies=Agency::all();
        $universities=University::all();
        $university_branches=UniversityBranch::all();
        return view('recruitment.create',[
            'agencies'=>$agencies,
            'universities'=>$universities,
            'university_branches'=>$university_branches,
            ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $name=$request->input('name');
        $surname=$request->input('surname');
        $country=$request->input('country');
        $telephone=$request->input('telephone');
        $e_mail=$request->input('e_mail');
        $university=$request->input('university');
        $branch=$request->input('branch');
        $learning_language=$request->input('learning_language');
        $degree=$request->input('degree');
        $application_status=$request->input('application_status');
        $heard_by=$request->input('heard_by');
        $agency=$request->input('agency');
        $consultancy=$request->input('consultancy');
        $notes=$request->input('notes');
        $recruitment=new Recruitment;
        $recruitment->name=$name;
        $recruitment->surname=$surname;
        $recruitment->country=$country;
        $recruitment->telephone=$telephone;
        $recruitment->e_mail=$e_mail;
        $recruitment->university=$university;
        $recruitment->branch=$branch;
        $recruitment->learning_language=$learning_language;
        $recruitment->degree=$degree;
        $recruitment->application_status=$application_status;
        $recruitment->heard_by=$heard_by;
        $recruitment->agency=$agency;
        $recruitment->consultancy=$consultancy;
        $recruitment->notes=$notes;
        $recruitment->registration_by=Auth::user()->name;
        $recruitment->save();
        return redirect()->route('recruitment.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function show(Recruitment $recruitment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function edit(Recruitment $recruitment)
    {
        $agencies=Agency::all();
        $universities=University::all();
        $university_branches=UniversityBranch::all();
        return view('recruitment.edit',[
            'recruitment'=>$recruitment,
            'agencies'=>$agencies,
            'universities'=>$universities,
            'university_branches'=>$university_branches
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Recruitment $recruitment)
    {
        $recruitment->name=$request->input('name');
        $recruitment->surname=$request->input('surname');
        $recruitment->country=$request->input('country');
        $recruitment->telephone=$request->input('telephone');
        $recruitment->e_mail=$request->input('e_mail');
        $recruitment->university=$request->input('university');
        $recruitment->learning_language=$request->input('learning_language');
        $recruitment->degree=$request->input('degree');
        $recruitment->application_status=$request->input('application_status');
        $recruitment->heard_by=$request->input('heard_by');
        $recruitment->agency=$request->input('agency');
        $recruitment->consultancy=$request->input('consultancy');
        $recruitment->notes=$request->input('notes');
        $recruitment->registration_by=Auth::user()->name;
        $recruitment->save();
        return redirect()->route('recruitment.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Recruitment  $recruitment
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $recruitment=Recruitment::find($request->input('id'));
        $recruitment->delete();
    }
}
