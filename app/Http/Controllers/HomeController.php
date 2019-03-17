<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->hasAnyRole(['recorder','admin']))
        {
            $students = Person::where('status','Öğrenci')->orderBy('id', 'desc')->get();
            return view('student.info')->with('students',$students);
        }
    }
}
