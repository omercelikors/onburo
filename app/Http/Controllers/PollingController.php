<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Classroom;
use App\Person;
use Auth;

use PhpWord;
use IOFactory;
use Jc;
class PollingController extends Controller
{
    public function polling_paper_show (){
        $classrooms=Classroom::all();
        $students=Person::whereNotNull('classroom_id')->get();
        return view('polling_paper.polling')->with('classrooms',$classrooms)->with('students',$students);
    }


    public function polling_paper_download(Request $request)
    {
        $classroom_id=$request->input('classrooms');
        $send_weekdays=$request->input('send_weekdays');
        $send_course_week_number=$request->input('send_course_week_number');
        $send_weekdays = implode(',', $send_weekdays);
        $send_weekdays_array= explode(',', $send_weekdays);
        $classroom=Classroom::find($classroom_id);
        $time=$classroom->time;
        $start_date=$classroom->starting_date();
        $end_date=$classroom->end_date();
        $teacher_name=$classroom->teacher_name();
        $teacher_surname=$classroom->teacher_surname();
        $general_info=$time."/".$start_date."/".$end_date."/".$teacher_name." ".$teacher_surname;
        $course_type=$classroom->course_type;
        $students=Person::where('classroom_id',$classroom_id)->get();

        $phpWord = new \PhpOffice\PhpWord\PhpWord();
        $section = $phpWord->addSection();
        $fancyTableStyle = array('borderSize' => 10, 'borderColor' => '1A1818');
        $table = $section->addTable($fancyTableStyle);
        $cellVCentered = array('valign' => 'center');
        $cellHCentered = array('alignment' => \PhpOffice\PhpWord\SimpleType\Jc::CENTER);
        $header_1 = array('size' => 10, 'bold' => true);
        $header_2 = array('size' => 9, 'bold' => true);

        $table->addRow(800);
        $cell_11=$table->addCell(7000,$cellVCentered);
        $cell_11->getStyle()->setGridSpan(3);
        $cell_11->addText($general_info,$header_1,$cellHCentered);
        $cell_12=$table->addCell(15000,$cellVCentered);
        $cell_12->getStyle()->setGridSpan(20);
        $cell_12->addText($course_type,$header_1,$cellHCentered);
        $cell_13=$table->addCell(1500,$cellVCentered);
        $cell_13->getStyle()->setGridSpan(1);
        $cell_13->addText($send_course_week_number.".Hafta",$header_1,$cellHCentered);

        $table->addRow(800);
        $cell_21=$table->addCell(1000,$cellVCentered);
        $cell_21->getStyle()->setGridSpan(1);
        $cell_21->addText("No",$header_2,$cellHCentered);
        $cell_22=$table->addCell(3000,$cellVCentered);
        $cell_22->getStyle()->setGridSpan(1);
        $cell_22->addText("Adı",$header_2,$cellHCentered);
        $cell_23=$table->addCell(3000,$cellVCentered);
        $cell_23->getStyle()->setGridSpan(1);
        $cell_23->addText("Soyadı",$header_2,$cellHCentered);

        $cell_24=$table->addCell(3000,$cellVCentered);
        $cell_24->getStyle()->setGridSpan(4);
        if($send_weekdays_array[0]!=""){
            $cell_24->addText($send_weekdays_array[0]."\n"."P.tesi",$header_2,$cellHCentered);
        } else {
            $cell_24->addText(null,null,$cellHCentered);
        }
        
        $cell_25=$table->addCell(3000,$cellVCentered);
        $cell_25->getStyle()->setGridSpan(4);
        if(isset($send_weekdays_array[1])){
            $cell_25->addText($send_weekdays_array[1]."\n"."\n"."Salı",$header_2,$cellHCentered);
        } else {
            $cell_25->addText(null,null,$cellHCentered);
        }
        
        $cell_26=$table->addCell(3000,$cellVCentered);
        $cell_26->getStyle()->setGridSpan(4);
        if(isset($send_weekdays_array[2])){
            $cell_26->addText($send_weekdays_array[2]."\n"."Çarş",$header_2,$cellHCentered);
        } else {
            $cell_26->addText(null,null,$cellHCentered);
        }

        $cell_27=$table->addCell(3000,$cellVCentered);
        $cell_27->getStyle()->setGridSpan(4);
        if(isset($send_weekdays_array[3])){
            $cell_27->addText($send_weekdays_array[3]."\n"."Perş",$header_2,$cellHCentered);
        } else {
            $cell_27->addText(null,null,$cellHCentered);
        }
        
        $cell_28=$table->addCell(3000,$cellVCentered);
        $cell_28->getStyle()->setGridSpan(4);
        if(isset($send_weekdays_array[4])){
            $cell_28->addText($send_weekdays_array[4]."\n"."Cuma",$header_2,$cellHCentered);
        } else {
            $cell_28->addText(null,null,$cellHCentered);
        }

        $cell_29=$table->addCell(1500,$cellVCentered);
        $cell_29->getStyle()->setGridSpan(1);
        $cell_29->addText("Sınav",$header_2,$cellHCentered);

        $counter=1;
        foreach($students as $student){
            $table->addRow(500);
            $table->addCell(1000,$cellVCentered)->addText($counter,null,$cellHCentered);
            $table->addCell(3000,$cellVCentered)->addText($student->name,null,$cellHCentered);
            $table->addCell(3000,$cellVCentered)->addText($student->surname,null,$cellHCentered);
            for ($c = 1; $c <= 20; $c++) {
                $table->addCell(750);
            }
            $table->addCell(1500);
            $counter++;
        }

        $objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $objWriter->save('Yoklama_Cetveli.docx');
        return response()->download(public_path('Yoklama_Cetveli.docx'));
    }
}
