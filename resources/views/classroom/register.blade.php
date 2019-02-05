@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('classroom_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Sınıf Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-10 px-0 my-3">
                        <div class="card-header">Sınıf Bilgileri</div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="course_type">*Kurs Tipi:</label>
                                        <select id="course_type" class="form-control" name="course_type" required>
                                            <option></option>
                                            <option>A1</option>
                                            <option>A2</option>
                                            <option>B1</option>
                                            <option>B2</option>
                                            <option>C1</option>
                                            <option>C1+</option>
                                            <option>YÖS</option>
                                            <option>Diğer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="starting_date">*Kurs Başlangıç Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input onchange="end_date_calculate()" id="starting_date" name="starting_date" autocomplete="off" placeholder="gg.dd.yyyy" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="end_date">*Kurs Bitiş Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="end_date" name="end_date" autocomplete="off" placeholder="gg.dd.yyyy" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="time">*Kurs Vakti:</label>
                                        <select id="time" class="form-control" name="time" required>
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
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="teacher_id">Kurs Öğretmeni:</label>
                                        <select id="teacher_id" class="form-control" name="teacher_id">
                                            <option value=""></option>
                                            @foreach ($teachers as $teacher)
                                            <option value="{{ $teacher->id }}">{{ $teacher->name }} {{ $teacher->surname }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <button id="submit_button" class="btn btn-primary" type="submit">Kaydet</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- date picker --}}
<script>
    starting_date=document.getElementById('starting_date');
    end_date=document.getElementById('end_date');
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#starting_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        minDate: today
    });
    $('#end_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        showOnFocus: false, 
        showRightIcon: false
    });
    function end_date_calculate(){
        parsed_strt_date=starting_date.value.split(".");
        strt_date_in_string = new Date(parsed_strt_date[2],parsed_strt_date[1]-1,parsed_strt_date[0]);
        strt_date_in_ms=strt_date_in_string.getTime();
        course_period=86400000*39;
        end_date_in_ms=strt_date_in_ms+course_period;
        end_date_in_string= new Date(end_date_in_ms);
        date=end_date_in_string.getDate();
        month=end_date_in_string.getMonth()+1;
        year=end_date_in_string.getFullYear();
        end_date.value=((date < 10) ? ("0"+ date) : date ) + "." + ((month < 10) ? ("0"+ (month)) : month)+"."+year;
    }
</script>
@endsection

@section('css')

@endsection