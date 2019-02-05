@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
        <div class="card my-3">
            <div class="card-header">Sınıflar</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-10 px-0 my-3">
                        <div class="card-header">Sınıflar</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-5">
                                    <div>
                                        <label>Kur Tipi(<small>Sınıfları kur tipini seçerek filitreyebilirsiniz</small>):</label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('A1')" type="radio" class="form-check-input" name="course_type">A1
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('A2')" type="radio" class="form-check-input" name="course_type">A2
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('B1')" type="radio" class="form-check-input" name="course_type">B1
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('B2')" type="radio" class="form-check-input" name="course_type">B2
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('C1')" type="radio" class="form-check-input" name="course_type">C1
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('C1+')" type="radio" class="form-check-input" name="course_type">C1+
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('YOS')" type="radio" class="form-check-input" name="course_type">YÖS
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('Dıger')" type="radio" class="form-check-input" name="course_type">Diğer
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input onclick="filter('All')" type="radio" id="all" class="form-check-input"
                                                name="course_type">All
                                        </label>
                                    </div>
                                </div>
                                <div class="col-5">
                                    <div class="form-group">
                                        <label for="classrooms">Sınıflar:</label>
                                        <select form="polling_paper_download" class="form-control" id="classrooms" name="classrooms" required></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-12 d-flex justify-content-center">
                        <button onclick="create_polling_paper()" id="create_button" class="btn btn-primary" type="button">Oluştur</button>
                    </div>
                </div>
            </div>
        </div>

        <div  class="card my-3">
            <div class="card-header">Yoklama Cetveli</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div  class="col-12 d-flex justify-content-center">
                        <table id="polling_paper_table">
                            <thead>
                                <tr>
                                    <th id="polling_general_info" colspan="3"></th>
                                    <th id="polling_course_type" colspan="20"></th>
                                    <th id="number_of_week" colspan="1"></th>
                                </tr>
                                <tr>
                                    <th colspan="1">No</th>
                                    <th colspan="1">Adı</th>
                                    <th colspan="1">Soyadı</th>
                                    <th id="day_1" colspan="4"></th>
                                    <th id="day_2" colspan="4"></th>
                                    <th id="day_3" colspan="4"></th>
                                    <th id="day_4" colspan="4"></th>
                                    <th id="day_5" colspan="4"></th>
                                    <th colspan="1">Sınav</th>
                                </tr>
                            </thead>
                            <tbody id="table_body">
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <form id="polling_paper_download" method="post" action="{{ route('polling_paper_download') }}">
                    @csrf
                    <input id="send_in_day_mounth" type="hidden" class="form-control" name="send_in_day_mounth[]" >
                    <button id="download_button" class="btn btn-primary" type="submit">İndir</button>
                </form>
            </div>
        </div>
</main>
@endsection

@section('js')
{{-- polling paper creating --}}
<script>
        //take weekdays according to current date
        day_1=document.getElementById('day_1');
        day_2=document.getElementById('day_2');
        day_3=document.getElementById('day_3');
        day_4=document.getElementById('day_4');
        day_5=document.getElementById('day_5');
        send_in_day_mounth=document.getElementById('send_in_day_mounth');
        d = new Date();
        days = ["Pazar", "Pazartesi", "Salı", "Çarşamba", "Perşembe", "Cuma", "Cumartesi"];
        current_day=d.getDay();
        current_time=d.getTime();
        one_day=86400000;
        if(days[current_day]=="Pazar"){
            strt=1*one_day;
            length=5*one_day;
        }else if(days[current_day]=="Pazartesi"){
            strt=0*one_day;
            length=4*one_day;
        }else if(days[current_day]=="Salı"){
            strt=-1*one_day;
            length=3*one_day;
        }else if(days[current_day]=="Çarşamba"){
            strt=-2*one_day;
            length=2*one_day;
        }else if(days[current_day]=="Perşembe"){
            strt=-3*one_day;
            length=1*one_day;
        }else if(days[current_day]=="Cuma"){
            strt=-4*one_day;
            length=0*one_day;
        }else if(days[current_day]=="Cumartesi"){
            strt=-5*one_day;
            length=-1*one_day;
        }
        weekdays_in_ms=[];
        weekdays_in_day_mounth=[];
        index=0;
        while(strt<=length){
            weekdays_in_ms[index]=current_time+strt;
            index++
            strt=strt+one_day;
        }
        for(index=0;index<=4;index++){
            weekdays_datetime = new Date(weekdays_in_ms[index]);
            weekdays_in_day_mounth[index]=((weekdays_datetime.getDate() < 10) ? ("0"+ weekdays_datetime.getDate()) : weekdays_datetime.getTime() ) + "." + ((weekdays_datetime.getMonth() + 1 < 10) ? ("0"+ (weekdays_datetime.getMonth()+1)) : weekdays_datetime.getMonth()+1);
        }
        day_1.innerHTML=weekdays_in_day_mounth[0] + "<br>" +"P.tesi";
        day_2.innerHTML=weekdays_in_day_mounth[1] + "<br>" +"Salı";
        day_3.innerHTML=weekdays_in_day_mounth[2] + "<br>" +"Çarş";
        day_4.innerHTML=weekdays_in_day_mounth[3] + "<br>" +"Perş";
        day_5.innerHTML=weekdays_in_day_mounth[4] + "<br>" +"Cuma";
        send_in_day_mounth.value=weekdays_in_day_mounth;

        // create_polling_paper body
        student={};
        students=[];
        @foreach($students as $student)
            student={ classroom_id:"{{ $student->classroom_id }}", student_name:"{{ $student->name }}", student_surname:"{{ $student->surname }}"};
            students.push(student);
        @endforeach
        polling_general_info=document.getElementById('polling_general_info');
        polling_course_type=document.getElementById('polling_course_type');
        table_body=document.getElementById('table_body');

        function create_polling_paper(){
            $("#table_body tr").remove(); 
            polling_classroom_id=document.getElementById('classrooms').value;
            for (i = 0; i< classrooms.length; i++){
                    if(classrooms[i].id==polling_classroom_id){
                        polling_general_info.innerHTML=classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name +" "+ classrooms[i].teacher_surname;
                        polling_course_type.innerHTML=classrooms[i].course_type;
                    }
            }
            counter=0;
            for (i = 0; i< students.length; i++){
                    if(students[i].classroom_id==polling_classroom_id){
                        counter++;
                        var row = table_body.insertRow(table_body.rows.length);
                        var cell1 = row.insertCell(0);
                        var cell2 = row.insertCell(1);
                        var cell3 = row.insertCell(2);
                        cell1.innerHTML = counter;
                        cell2.innerHTML = students[i].student_name;
                        cell3.innerHTML = students[i].student_surname;
                        for(a=3;a<=23;a++){
                            row.insertCell(a);
                        }
                        
                    }
            }
        }
</script>

{{-- classrooms dropdown filter according to "course types" --}}
<script>
    //all classrooms were received "classrooms array object"
    classroom={};
    classrooms=[];
    @foreach($classrooms as $classroom)
        classroom={ id:"{{ $classroom->id }}", course_type:"{{ $classroom->course_type }}", time:"{{ $classroom->time }}", starting_date:"{{ $classroom->starting_date() }}", end_date:"{{ $classroom->end_date() }}", teacher_name:"{{ $classroom->teacher_name() }}", teacher_surname:"{{ $classroom->teacher_surname() }}"};
        classrooms.push(classroom);
    @endforeach
    // when page load, "all" course types had been clicked
    var all = document.getElementById('all');
    all.click();
    // when clicked course type radio button, classrooms were filtered according to course types
    function filter (course_type){
        document.getElementById("classrooms").options.length=1;
        select = document.getElementById('classrooms');
        if(course_type=="A1"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="A1"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="A2"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="A2"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="B1"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="B1"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="B2"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="B2"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="C1"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="C1"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="C1+"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="C1+"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="YOS"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="YÖS"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="Diger"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="Diğer"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="All"){
            for (i = 0; i< classrooms.length; i++){
                var opt = document.createElement('option');
                opt.value = classrooms[i].id;
                opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                select.appendChild(opt);
            }
        }
    }
</script>
@endsection

@section('css')
<style>
    th, td { 
        border: 1px solid black;
        
        }
    table{
        width:100%;
        text-align: center;
    }
</style>
@endsection