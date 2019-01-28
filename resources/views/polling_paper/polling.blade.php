@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('student_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Sınıflar</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-8">
                        <legend style="width:7%;">Sınıflar</legend>
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
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input onclick="filter('All')" type="radio" id="all" class="form-check-input"
                                            name="course_type">All
                                    </label>
                                </div>
                            </div>
                            <div class="col-7">
                                <div class="form-group">
                                    <label for="classrooms">Sınıflar:</label>
                                    <select class="form-control" id="classrooms" name="classrooms"></select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
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
                                    <th id="polling_general_info" colspan="2"></th>
                                    <th id="polling_course_type" colspan="20"></th>
                                    <th id="number_of_week" colspan="1"></th>
                                </tr>
                                <tr>
                                    <th colspan="1">No</th>
                                    <th colspan="1">Öğrenci Adı</th>
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
                <button id="download_button" class="btn btn-primary" type="button">İndir</button>
            </div>
        </div>
    </form>
</main>
@endsection
{{-- polling paper creating --}}
@section('js')
<script type="text/javascript">
        // take all students in array object
        student={};
        students=[];
        @foreach($students as $student)
            student={ classroom_id:"{{ $student->classroom_id }}", student_name:"{{ $student->name }}"};
            students.push(student);
        @endforeach
        // take date of current weekday in array
        let curr = new Date 
        let week = []
        for (let i = 1; i <= 5; i++) {
            let first = curr.getDate() - curr.getDay() + i 
            let day = new Date(curr.setDate(first)).toISOString().slice(0, 10)
            week.push(day)
        }
        day_1=document.getElementById('day_1');
        day_2=document.getElementById('day_2');
        day_3=document.getElementById('day_3');
        day_4=document.getElementById('day_4');
        day_5=document.getElementById('day_5');
        day_1.innerHTML=week[0] + "<br>" + "P.tesi";
        day_2.innerHTML=week[1] + "<br>" +"Salı";
        day_3.innerHTML=week[2] + "<br>" +"Çarş";
        day_4.innerHTML=week[3] + "<br>" +"Perş";
        day_5.innerHTML=week[4] + "<br>" +"Cuma";
        // take number week of current month
        Date.prototype.getWeek = function () {
            var target  = new Date(this.valueOf());
            var dayNr   = (this.getDay() + 6) % 7;
            target.setDate(target.getDate() - dayNr + 3);
            var firstThursday = target.valueOf();
            target.setMonth(0, 1);
            if (target.getDay() != 4) {
                target.setMonth(0, 1 + ((4 - target.getDay()) + 7) % 7);
            }
            return 1 + Math.ceil((firstThursday - target) / 604800000);
            }

        var d= new Date();
        number_of_week=document.getElementById('number_of_week');
        number_of_week.innerHTML=d.getWeek() + ".Hafta";
        // create_polling_paper
        polling_general_info=document.getElementById('polling_general_info');
        polling_course_type=document.getElementById('polling_course_type');
        table_body=document.getElementById('table_body');
        function create_polling_paper(){
            $("#table_body tr").remove(); 
            polling_classroom_id=document.getElementById('classrooms').value;
            for (i = 0; i< classrooms.length; i++){
                    if(classrooms[i].id==polling_classroom_id){
                        polling_general_info.innerHTML=classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name;
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
                        for(a=2;a<=22;a++){
                            row.insertCell(a);
                        }
                        cell1.innerHTML = counter;
                        cell2.innerHTML = students[i].student_name;
                    }
            }
        }
</script>

{{-- classrooms dropdown filter according to "course types" --}}
<script type="text/javascript">
    //all classrooms were received "classrooms array object"
    classroom={};
    classrooms=[];
    @foreach($classrooms as $classroom)
        classroom={ id:"{{ $classroom->id }}", course_type:"{{ $classroom->course_type }}", time:"{{ $classroom->time }}", starting_date:"{{ $classroom->starting_date() }}", end_date:"{{ $classroom->end_date() }}", teacher_name:"{{ $classroom->teacher_name() }}"};
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
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="A2"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="A2"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="B1"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="B1"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="B2"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="B2"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="C1"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="C1"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="C1+"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="C1+"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="All"){
            for (i = 0; i< classrooms.length; i++){
                var opt = document.createElement('option');
                opt.value = classrooms[i].id;
                opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name;
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