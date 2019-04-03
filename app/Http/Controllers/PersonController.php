<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Person;
use App\Payment;
use App\Classroom;
use App\Agency;
use App\CourseStudentNumber;
use Debugbar;
use Auth;
class PersonController extends Controller{

    public function student_other1_show (){
        $students = Person::where('status','Öğrenci')->orderBy('id', 'desc')->get();
        return view('student.info_other1')->with('students',$students);
    }

    public function student_other2_show (){
        $students = Person::where('status','Öğrenci')->orderBy('id', 'desc')->get();
        return view('student.info_other2')->with('students',$students);
    }

    public function student_other3_show (){
        $students = Person::where('status','Öğrenci')->orderBy('id', 'desc')->get();
        return view('student.info_other3')->with('students',$students);
    }

    public function student_register_show (){
        $classrooms=Classroom::all();
        $agencies=Agency::all();
        return view('student.register')->with('classrooms',$classrooms)->with('agencies',$agencies);
    }

    public function student_edit_show ($student_id){
        $student= Person::find($student_id);
        $classrooms=Classroom::all();
        $agencies=Agency::all();
        return view('student.edit')->with('student',$student)->with('classrooms',$classrooms)->with('agencies',$agencies);
    }

    public function student_delete(Request $request){
            $student_id=$request->input('id');
            $student = Person::find($student_id);
            $student->delete();
            $student_payments=Payment::where('person_id',$student_id)->delete();
    }

    public function student_register (Request $request) {
            $name=$request->input('name');
            $surname=$request->input('surname');
            date_default_timezone_set("Europe/Istanbul");
            $birthdate=$request->input('birthdate');
            $birthdate_in_time=strtotime($birthdate);
            $current_date=date("d.m.Y");
            $current_date_in_time=strtotime($current_date);
            $age_in_time=$current_date_in_time-$birthdate_in_time;
            $age=$age_in_time/31536000;
            $birthdate=date('Y-m-d' , strtotime($birthdate));
            $telephone=$request->input('telephone');
            $e_mail=$request->input('e_mail');
            $country=$request->input('countries');
            $languages=$request->input('languages');
            if($languages[0]==null){
                $languages=null;
            } else {
                $languages = implode(',', $languages);
            }
            $registration_by=Auth::user()->name;
            $classroom_id=$request->input('classrooms');
            $agency_id=$request->input('agency');
            $sex_status=$request->input('sex_status');
            $marital_status=$request->input('marital_status');
            $university_status=$request->input('university_status');
            $university_department=$request->input('university_department');
            $education_level_status=$request->input('education_level_status');
            $children_status=$request->input('children_status');
            $children_number=$request->input('children_number');
            $children_age_range_status=$request->input('children_age_range_status');
            if(isset($children_age_range_status)){
                $children_age_range_status = implode(',', $children_age_range_status);
            }
            $note=$request->input('note');
            $relative_university_status=$request->input('relative_university_status');
            $relative_name=$request->input('relative_name');
            $relative_telephone=$request->input('relative_telephone');
            $relative_education_level_status=$request->input('relative_education_level_status');
            $online_lesson_status=$request->input('online_lesson_status');
            $citizenship_status=$request->input('citizenship_status');
            $home_status=$request->input('home_status');
            $heard_by_status=$request->input('heard_by_status');
            $heard_by_other=$request->input('heard_by_other');
            $demanded_education_status=$request->input('demanded_education_status');

            $student=new Person;
            $student->name=$name;
            $student->surname=$surname;
            $student->status="Öğrenci";
            if($classroom_id!=null){
                $student->join_status="Aktif";
            } else {
                $student->join_status="Pasif";
            }
            $student->birthdate=$birthdate;
            $student->age=$age;
            $student->telephone=$telephone;
            $student->e_mail=$e_mail;
            $student->country=$country;
            $student->languages=$languages;
            $student->registration_by=$registration_by;
            $student->classroom_id=$classroom_id;
            $student->agency_id=$agency_id;
            $student->sex_status=$sex_status;
            $student->marital_status=$marital_status;
            $student->university_status=$university_status;
            $student->university_department=$university_department;
            $student->education_level_status=$education_level_status;
            $student->children_status=$children_status;
            $student->children_number= $children_number;
            $student->children_age_range_status=$children_age_range_status;
            $student->note=$note;
            $student->relative_university_status=$relative_university_status;
            $student->relative_name=$relative_name;
            $student->relative_telephone=$relative_telephone;
            $student->relative_education_level_status=$relative_education_level_status;
            $student->online_lesson_status=$online_lesson_status;
            $student->citizenship_status=$citizenship_status;
            $student->home_status=$home_status;
            $student->heard_by_status=$heard_by_status;
            $student->heard_by_other=$heard_by_other;
            $student->demanded_education_status=$demanded_education_status;
            $student->save();
            if(isset($classroom_id)){
                $course_type=Classroom::find($classroom_id)->course_type;
                $course_student_number=CourseStudentNumber::find(1);
                if($course_type=="A1"){
                    $course_student_number->A1=($course_student_number->A1)+1;
                    $course_student_number->save();
                } else if($course_type=="B2"){
                    $course_student_number->B2=($course_student_number->B2)+1;
                    $course_student_number->save();
                }
            }
            $student=Person::where('name',$name)->where('surname',$surname)->first();
            $student_id=$student->id;
            if(isset($student->agency)){
                $agency_name=$student->agency->name;
            }else {
                $agency_name=null;
            }
            return redirect()->route('payment_register_show',['button_register'=>0,])->with('name',$name)->with('surname',$surname)->with('student_id',$student_id)->with('agency_id',$agency_id)->with('agency_name',$agency_name);
    }

    public function student_edit_register(Request $request){
            $student_id=$request->input('student_id');
            $student=Person::find($student_id);
            $student->name=$request->input('name');
            $student->surname=$request->input('surname');
            $birthdate=$request->input('birthdate');
            $birthdate_in_time=strtotime($birthdate);
            $current_date=date("d.m.Y");
            $current_date_in_time=strtotime($current_date);
            $age_in_time=$current_date_in_time-$birthdate_in_time;
            $age=$age_in_time/31536000;
            $birthdate=date('Y-m-d' , strtotime($birthdate));
            $student->birthdate=$birthdate;
            $student->age=$age;
            $student->telephone=$request->input('telephone');
            $student->e_mail=$request->input('e_mail');
            $student->country=$request->input('countries');
            $languages=$request->input('languages');
            $student->languages = implode(',', $languages);
            $student->why_abandon_us_status=$request->input('why_abandon_us_status');
            $student->why_abandon_us_note=$request->input('why_abandon_us_note');
            $student->registration_by=Auth::user()->name;
            $classroom_id=$request->input('classrooms');
            $student->classroom_id= $classroom_id;
            if(isset($classroom_id)){
                $course_type=Classroom::find($classroom_id)->course_type;
                $course_student_number=CourseStudentNumber::find(1);
                if($course_type=="A1"){
                    $course_student_number->A1=($course_student_number->A1)+1;
                    $course_student_number->save();
                } else if($course_type=="B2"){
                    $course_student_number->B2=($course_student_number->B2)+1;
                    $course_student_number->save();
                }
            }
            $agency_id=$request->input('agency');
            $payments=Payment::where('person_id',$student_id)->get();
            $agency=Agency::where('id',$agency_id)->first();
            if($agency_id!=null){
                foreach($payments as $payment){
                    $payment->agency_id=$agency_id;
                    $payment->agency_debt_amount=$payment->debt_amount*0.1;
                    $agency->debt_amount=($agency->debt_amount)+$payment->agency_debt_amount;
                    $agency->currency_unit=$payment->currency_unit;
                    $agency->save();
                    $payment->save();
                }
            }else {
                foreach($payments as $payment){
                    if ($student->agency->id) {
                        $agency=Agency::where('id',$student->agency->id)->first();
                        $agency->debt_amount=($agency->debt_amount)-$payment->agency_debt_amount;
                        $agency->paid_amount=($agency->paid_amount)-$payment->agency_paid_amount;
                        $agency->save();
                        $payment->agency_id=null;
                        $payment->agency_debt_amount=null;
                        $payment->agency_paid_amount=null;
                        $payment->save();
                    }
                }
            }
            $student->agency_id=$agency_id;
            if($student->classroom_id!=null){
                $student->join_status="Aktif";
            } else {
                $student->join_status="Pasif";
            }
            $student->sex_status=$request->input('sex_status');
            $student->marital_status=$request->input('marital_status');
            $student->university_status=$request->input('university_status');
            $student->university_department=$request->input('university_department');
            $student->education_level_status=$request->input('education_level_status');
            $student->children_status=$request->input('children_status');
            $student->children_number=$request->input('children_number');
            $children_age_range_status=$request->input('children_age_range_status');
            if(isset($children_age_range_status)){
                $student->children_age_range_status=implode(',', $children_age_range_status);
            }
            $student->note=$request->input('note');
            $student->relative_university_status=$request->input('relative_university_status');
            $student->relative_name=$request->input('relative_name');
            $student->relative_telephone=$request->input('relative_telephone');
            $student->relative_education_level_status=$request->input('relative_education_level_status');
            $student->online_lesson_status=$request->input('online_lesson_status');
            $student->citizenship_status=$request->input('citizenship_status');
            $student->home_status=$request->input('home_status');
            $student->heard_by_status=$request->input('heard_by_status');
            $student->heard_by_other=$request->input('heard_by_other');
            $student->demanded_education_status=$request->input('demanded_education_status');
            $student->save();
            return redirect('/home');
    }
    //CANDİDATE
    public function candidate_student_info_show (){
        $candidate_students=Person::where('status','Aday Öğrenci')->orderBy('id', 'desc')->get();
        return view('candidate_student.info')->with('candidate_students',$candidate_students);
    }

    public function candidate_student_register_show (){
        return view('candidate_student.register');
    }

    public function candidate_student_register (Request $request){
            $name=$request->input('name');
            $surname=$request->input('surname');
            $telephone=$request->input('telephone');
            $e_mail=$request->input('e_mail');
            $country=$request->input('country');
            $note=$request->input('note');
            $demanded_education_status=$request->input('demanded_education_status');
            $registration_by=Auth::user()->name;

            $candidate_student=new Person;
            $candidate_student->name=$name;
            $candidate_student->surname=$surname;
            $candidate_student->status="Aday Öğrenci";
            $candidate_student->telephone=$telephone;
            $candidate_student->e_mail=$e_mail;
            $candidate_student->country=$country;
            $candidate_student->note=$note;
            $candidate_student->demanded_education_status=$demanded_education_status;
            $candidate_student->registration_by=$registration_by;
            $candidate_student->save();
            return redirect('/candidate-student-info-show');
    }

    public function candidate_student_edit_show ($candidate_student_id){
        $candidate_student= Person::find($candidate_student_id);
        return view('candidate_student.edit')->with('candidate_student',$candidate_student);
    }

    public function candidate_student_edit_register (Request $request){
            $candidate_student_id=$request->input('candidate_student_id');
            $candidate_student=Person::find($candidate_student_id);
            $candidate_student->name=$request->input('name');
            $candidate_student->surname=$request->input('surname');
            $candidate_student->telephone=$request->input('telephone');
            $candidate_student->e_mail=$request->input('e_mail');
            $candidate_student->country=$request->input('country');
            $candidate_student->note=$request->input('note');
            $candidate_student->demanded_education_status=$request->input('demanded_education_status');
            $candidate_student->registration_by=Auth::user()->name;
            $candidate_student->save();
            return redirect('/candidate-student-info-show');
    }

    public function candidate_student_delete(Request $request){
            $candidate_student_id=$request->input('id');
            $candidate_student = Person::find($candidate_student_id);
            $candidate_student->delete();
    }
    //COMPANY EMPLOYEE
    public function company_employee_info_show (){
        $company_employees=Person::where('status','Şirket Çalışanı')->orderBy('id', 'desc')->get();
        return view('company_employee.info')->with('company_employees',$company_employees);
    }

    public function company_employee_register_show (){
        return view('company_employee.register');
    }

    public function company_employee_register (Request $request){
            $name=$request->input('name');
            $surname=$request->input('surname');
            $birthdate=$request->input('birthdate');
            $birthdate=date('Y-m-d' , strtotime($birthdate));
            $telephone=$request->input('telephone');
            $e_mail=$request->input('e_mail');
            $note=$request->input('note');
            $registration_by=Auth::user()->name;

            $company_employee=new Person;
            $company_employee->name=$name;
            $company_employee->surname=$surname;
            $company_employee->status="Şirket Çalışanı";
            $company_employee->birthdate=$birthdate;
            $company_employee->telephone=$telephone;
            $company_employee->e_mail=$e_mail;
            $company_employee->note=$note;
            $company_employee->registration_by=$registration_by;
            $company_employee->save();
            return redirect('/company-employee-info-show');
    }

    public function company_employee_edit_show ($company_employee_id){
        $company_employee= Person::find($company_employee_id);
        return view('company_employee.edit')->with('company_employee',$company_employee);
    }

    public function company_employee_edit_register (Request $request){
            $company_employee_id=$request->input('company_employee_id');
            $company_employee=Person::find($company_employee_id);
            $company_employee->name=$request->input('name');
            $company_employee->surname=$request->input('surname');
            $birthdate=$request->input('birthdate');
            $birthdate=date('Y-m-d' , strtotime($birthdate));
            $company_employee->birthdate=$birthdate;
            $company_employee->telephone=$request->input('telephone');
            $company_employee->e_mail=$request->input('e_mail');
            $company_employee->note=$request->input('note');
            $company_employee->registration_by=Auth::user()->name;
            $company_employee->save();
            return redirect('/company-employee-info-show');
    }

    public function company_employee_delete(Request $request){
            $company_employee_id=$request->input('id');
            $company_employee = Person::find($company_employee_id);
            $company_employee->delete();
    }

    //TEACHER
    public function teacher_info_show (){
        $teachers=Person::where('status','Öğretmen')->orderBy('id', 'desc')->get();
        return view('teacher.info')->with('teachers',$teachers);
    }

    public function teacher_register_show (){
        return view('teacher.register');
    }

    public function teacher_register (Request $request){
            $name=$request->input('name');
            $surname=$request->input('surname');
            $birthdate=$request->input('birthdate');
            $birthdate=date('Y-m-d' , strtotime($birthdate));
            $telephone=$request->input('telephone');
            $e_mail=$request->input('e_mail');
            $registration_by=Auth::user()->name;

            $teacher=new Person;
            $teacher->name=$name;
            $teacher->surname=$surname;
            $teacher->status="Öğretmen";
            $teacher->birthdate=$birthdate;
            $teacher->telephone=$telephone;
            $teacher->e_mail=$e_mail;
            $teacher->registration_by=Auth::user()->name;
            $teacher->save();
            return redirect('/teacher-info-show');
    }

    public function teacher_edit_show ($teacher_id){
        $teacher= Person::find($teacher_id);
        return view('teacher.edit')->with('teacher',$teacher);
    }

    public function teacher_edit_register (Request $request){
            $teacher_id=$request->input('teacher_id');
            $teacher=Person::find($teacher_id);
            $teacher->name=$request->input('name');
            $teacher->surname=$request->input('surname');
            $birthdate=$request->input('birthdate');
            $birthdate=date('Y-m-d' , strtotime($birthdate));
            $teacher->birthdate=$birthdate;
            $teacher->telephone=$request->input('telephone');
            $teacher->e_mail=$request->input('e_mail');
            $teacher->registration_by=Auth::user()->name;
            $teacher->save();
            return redirect('/teacher-info-show');
    }

    public function teacher_delete(Request $request){
            $teacher_id=$request->input('id');
            $teacher = Person::find($teacher_id);
            $classrooms=Classroom::where('teacher_id',$teacher_id)->get();
            foreach($classrooms as $classroom){
                $classroom=Classroom::find($classroom->id);
                $classroom->teacher_id=null;
                $classroom->save();
            }
            $teacher->delete();
    }

    public function agency_name(Request $request){
        $student_id=$request->input('student_id');
        $student=Person::find($student_id);
        if(isset($student->agency)){
            $agency_name=$student->agency->name;
            $agency_id=$student->agency->id;
            return [$agency_name,$agency_id];
        } else {
            return null;
        }
    }
}
