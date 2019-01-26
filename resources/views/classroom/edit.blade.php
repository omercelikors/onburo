@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('classroom_edit_register') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="classroom_id" value="{{ $classroom->id }}">
        <div class="card my-3">
            <div class="card-header">Sınıf Düzenle</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-12">
                        <legend style="width:9%;">Sınıf Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="course_type">*Kur Tipi:</label>
                                    <select id="course_type" class="form-control" name="course_type">
                                        <option></option>
                                        <option>A1</option>
                                        <option>A2</option>
                                        <option>B1</option>
                                        <option>B2</option>
                                        <option>C1</option>
                                        <option>C1+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="starting_date">*Kur Başlangıç Tarihi:</label>
                                    <input type="date" class="form-control" id="starting_date" value="{{ $classroom->starting_date_2() }}" name="starting_date">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="end_date">*Kur Bitiş Tarihi:</label>
                                    <input type="date" class="form-control" id="end_date" value="{{ $classroom->end_date_2() }}" name="end_date">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="time">*Kur Vakti:</label>
                                    <select id="time" class="form-control" name="time">
                                        <option></option>
                                        <option>Sabah</option>
                                        <option>Öğlen</option>
                                        <option>Akşam</option>
                                        <option>YÖS</option>
                                        <option>Özel</option>
                                        <option>Diğer</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="teacher_id">Kur Öğretmeni:</label>
                                    <select id="teacher_id" class="form-control" name="teacher_id">
                                            <option value=""></option>
                                            @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }}</option>
                                            @endforeach
                                    </select>
                                </div>
                            </div>
                    </fieldset>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <button id="submit_button" class="btn btn-primary" type="submit">Düzenle</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- country dropdown js --}}
<script src="{{ asset('js/extensions/bootstrap-formhelpers.min.js') }}"></script>
{{-- disabled future dates for "birthdate field" --}}
<script>
    var today = new Date();
    var dd = today.getDate();
    var mm = today.getMonth() + 1; //January is 0!
    var yyyy = today.getFullYear();
    if (dd < 10) {
        dd = '0' + dd
    }
    if (mm < 10) {
        mm = '0' + mm
    }
    today = yyyy + '-' + mm + '-' + dd;
    document.getElementById("starting_date").setAttribute("min", today);
    document.getElementById("end_date").setAttribute("min", today);
</script>
{{-- course_type dropdown is having "selected attirubute" according to value coming --}}
<script>
        $(document).ready(function () {
            course_type_length = document.getElementById("course_type").options.length;
            for (i = 0; i < course_type_length; i++) {
                if (document.getElementById("course_type").options[i].value == "{{ $classroom->course_type }}") {
                    document.getElementById("course_type").options[i].setAttribute('selected', true);
                }
            }
        });
</script>
{{-- time dropdown is having "selected attirubute" according to value coming --}}
<script>
        $(document).ready(function () {
            time_length = document.getElementById("time").options.length;
            for (i = 0; i < time_length; i++) {
                if (document.getElementById("time").options[i].value == "{{ $classroom->time }}") {
                    document.getElementById("time").options[i].setAttribute('selected', true);
                }
            }
        });
</script>
{{-- teacher dropdown is having "selected attirubute" according to value coming --}}
<script>
        $(document).ready(function () {
            teacher_id_length = document.getElementById("teacher_id").options.length;
            for (i = 0; i < teacher_id_length; i++) {
                if (document.getElementById("teacher_id").options[i].value == "{{ $classroom->teacher_id }}") {
                    document.getElementById("teacher_id").options[i].setAttribute('selected', true);
                }
            }
        });
</script>
{{-- mandatory fields --}}
<script>
    setInterval(function(){
        course_type=document.getElementById('course_type').value;
        starting_date=document.getElementById('starting_date').value;
        end_date=document.getElementById('end_date').value;
        time=document.getElementById('time').value;
        if(course_type=="" || starting_date=="" || end_date=="" || time==""){
            document.getElementById("submit_button").disabled=true;
        } else {
            document.getElementById("submit_button").disabled=false;
        }
    }, 1000);
</script>
@endsection

@section('css')

@endsection