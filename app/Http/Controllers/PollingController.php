<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Person;
use Auth;

use PhpWord;
use IOFactory;

class PollingController extends Controller
{
    public function polling_paper_show (){
        $classrooms=Classroom::all();
        $students=Person::whereNotNull('classroom_id')->get();
        return view('polling_paper.polling')->with('classrooms',$classrooms)->with('students',$students);
    }

    public function create()
    {
        return view('polling_paper.createdocument');
    }

    public function store(Request $request)
    {
        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();

        $header = array('size' => 16, 'bold' => true);
        // 1. Basic table
        
        $section->addText('Basic table', $header);
        $table = $section->addTable();
        for ($r = 1; $r <= 8; $r++) {
            $table->addRow();
            for ($c = 1; $c <= 5; $c++) {
                $table->addCell(1750)->addText("Row {$r}, Cell {$c}");
            }
        }
       
        

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('Yoklama_Cetveli.docx');
        return response()->download(public_path('Yoklama_Cetveli.docx'));
    }
}
