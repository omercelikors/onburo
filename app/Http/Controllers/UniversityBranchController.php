<?php

namespace App\Http\Controllers;

use App\UniversityBranch;
use Illuminate\Http\Request;

class UniversityBranchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $branches=UniversityBranch::all()->orderBy('name', 'desc')->get();
        return view('system.branch.index',['branches'=>$branches]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('system.branch.create');
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

        $branch=new UniversityBranch;
        $branch->name=$name;
        $branch->save();
        return redirect()->route('university-branch.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\UniversityBranch  $universityBranch
     * @return \Illuminate\Http\Response
     */
    public function show(UniversityBranch $universityBranch)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\UniversityBranch  $universityBranch
     * @return \Illuminate\Http\Response
     */
    public function edit(UniversityBranch $universityBranch)
    {
        return view('system.branch.edit',['universityBranch'=>$universityBranch]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\UniversityBranch  $universityBranch
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UniversityBranch $universityBranch)
    {
        $universityBranch->name=$request->input('name');
        $universityBranch->save();
        return redirect()->route('university-branch.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\UniversityBranch  $universityBranch
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        $branch=UniversityBranch::find($request->input('id'));
        $branch->delete();
    }
}
