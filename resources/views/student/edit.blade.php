@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('student_edit_register') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="student_id" value="{{ $student->id }}">
        <div class="card my-3">
            <div class="card-header">Öğrenci Düzenle</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-7">
                        <legend style="width:14%;">Kişisel Bilgiler</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name">*Adı:</label>
                                    <input type="text" class="form-control" id="name" name="name" value="{{ $student->name }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="e_mail">*E-posta Adresi:</label>
                                    <input type="email" class="form-control" id="e_mail" name="e_mail" value="{{ $student->e_mail }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="telephone">*Telefon:</label>
                                    <input type="number" class="form-control" id="telephone" name="telephone" value="{{ $student->telephone }}">
                                </div>
                            </div>
                        </div>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="birthdate">*Doğum Tarihi:</label>
                                    <input type="date" class="form-control" id="birthdate" name="birthdate" value="{{ $formatted_date }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="languages">*Konuştuğu Diller:</label>
                                    <select id="languages" class="form-control input-medium bfh-languages"
                                        data-language="US" name="languages[]" multiple></select>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="country">Ülke:</label>
                                    <select id="country" class="form-control input-medium bfh-countries" data-country="US"
                                        name="country"></select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
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
                                        <input onclick="filter('A1')" id="A1" type="radio" class="form-check-input"
                                            name="course_type">A1
                                    </label>
                                </div>
                                <div class="form-check-inline mr-1">
                                    <label class="form-check-label">
                                        <input onclick="filter('A2')" id="A2" type="radio" class="form-check-input"
                                            name="course_type">A2
                                    </label>
                                </div>
                                <div class="form-check-inline mr-1">
                                    <label class="form-check-label">
                                        <input onclick="filter('B1')" id="B1" type="radio" class="form-check-input"
                                            name="course_type">B1
                                    </label>
                                </div>
                                <div class="form-check-inline mr-1">
                                    <label class="form-check-label">
                                        <input onclick="filter('B2')" id="B2" type="radio" class="form-check-input"
                                            name="course_type">B2
                                    </label>
                                </div>
                                <div class="form-check-inline mr-1">
                                    <label class="form-check-label">
                                        <input onclick="filter('C1')" id="C1" type="radio" class="form-check-input"
                                            name="course_type">C1
                                    </label>
                                </div>
                                <div class="form-check-inline mr-1">
                                    <label class="form-check-label">
                                        <input onclick="filter('C1+')" id="C1_plus" type="radio" class="form-check-input"
                                            name="course_type">C1+
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
                                    <label for="classrooms">*Sınıflar:</label>
                                    <select class="form-control" id="classrooms" name="classrooms"></select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-5">
                        <legend style="width:10%;">Diğer</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-4">
                                <div>
                                    <label>*Kitap Durumu:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Evet" name="book_status"
                                            @if($student->book_status=="Evet")checked @endif>Evet
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Hayır" name="book_status"
                                            @if($student->book_status=="Hayır")checked @endif>Hayır
                                    </label>
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="note">Not:</label>
                                    <textarea class="form-control" rows="5" id="note" name="note">{{ $student->note }}</textarea>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
            </div>
        </div>

        <div class="card my-3">
            <div class="card-header">Kişisel İletişim Dinamikleri Düzenle</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-4 mr-2">
                        <legend style="width:28%;">Cinsiyet-Evlilik</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-4">
                                <div>
                                    <label>Cinsiyet:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Erkek" name="sex_status"
                                            @if($student->sex_status=="Erkek") checked @endif>Erkek
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Kız" name="sex_status"
                                            @if($student->sex_status=="Kız") checked @endif>Kız
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div>
                                    <label>Evlilik Durumu:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Evli" name="marital_status"
                                            @if($student->marital_status=="Evli") checked @endif>Evli
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Bekar" name="marital_status"
                                            @if($student->marital_status=="Bekar") checked @endif>Bekar
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-7">
                        <legend style="width:20%;">Üniversite Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div>
                                    <label>Üniversiteye Gitme Durumu:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Evet" name="university_status"
                                            @if($student->university_status=="Evet") checked @endif>Evet
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Hayır" name="university_status"
                                            @if($student->university_status=="Hayır") checked @endif>Hayır
                                    </label>
                                </div>
                            </div>
                            <div class="col-4">
                                <div class="form-group">
                                    <label for="university_department">Üniversite Bölümü:</label>
                                    <input type="text" class="form-control" id="university_department" name="university_department"
                                        value="{{ $student->university_department }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div>
                                    <label>Yakın Üniversite Durumu:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Evet" name="relative_university_status"
                                            @if($student->relative_university_status=="Evet") checked @endif>Evet
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Hayır" name="relative_university_status"
                                            @if($student->relative_university_status=="Hayır") checked @endif>Hayır
                                    </label>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-4">
                        <legend style="width:28%;">Yakın Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="relative_name">Yakın İsmi:</label>
                                    <input type="text" class="form-control" id="relative_name" name="relative_name"
                                        value="{{ $student->relative_name }}">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="relative_telephone">Yakın Telefonu:</label>
                                    <input type="number" class="form-control" id="relative_telephone" name="relative_telephone"
                                        value="{{ $student->relative_telephone }}">
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-6">
                        <legend style="width:20%;">Çocuk Bilgileri</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div>
                                    <label>Çocuk Durumu:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Evet" name="children_status"
                                            @if($student->children_status=="Evet") checked @endif>Evet
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Hayır" name="children_status"
                                            @if($student->children_status=="Hayır") checked @endif>Hayır
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="children_number">Çocuk Sayısı:</label>
                                    <input type="number" class="form-control" id="children_number" name="children_number"
                                        value="{{ $student->children_number }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="children_age_range">Çocuk Yaş Aralığı:</label>
                                    <select class="form-control" id="children_age_range" name="children_age_range_status">
                                        <option value="0-10 Yaş">0-10 Yaş</option>
                                        <option value="10-20 Yaş">10-20 Yaş</option>
                                        <option value="20-30 Yaş">20-30 Yaş</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-11">
                        <legend style="width:4%;">Diğer</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-2">
                                <div>
                                    <label>Online Ders Durumu:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Evet" name="online_lesson_status"
                                            @if($student->online_lesson_status=="Evet") checked @endif>Evet
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Hayır" name="online_lesson_status"
                                            @if($student->online_lesson_status=="Hayır") checked @endif>Hayır
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div>
                                    <label>Vatandaşlık İşlem Yardımı:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Evet" name="citizenship_status"
                                            @if($student->citizenship_status=="Evet") checked @endif>Evet
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Hayır" name="citizenship_status"
                                            @if($student->citizenship_status=="Hayır") checked @endif>Hayır
                                    </label>
                                </div>
                            </div>
                            <div class="col-2">
                                <div>
                                    <label>Ev Yardımı:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Evet" name="home_status"
                                            @if($student->home_status=="Evet") checked @endif>Evet
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" value="Hayır" name="home_status"
                                            @if($student->home_status=="Hayır") checked @endif>Hayır
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="heard_by">Duyduğu Yer:</label>
                                    <input type="text" class="form-control" id="heard_by" name="heard_by" value="{{ $student->heard_by }}">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="demanded_education">Talep Edilen Eğitimler:</label>
                                    <input type="text" class="form-control" id="demanded_education" name="demanded_education"
                                        value="{{ $student->demanded_education }}">
                                </div>
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
    document.getElementById("birthdate").setAttribute("max", today);
</script>
{{-- classrooms dropdown filter --}}
<script type="text/javascript">
//all classrooms were received "classrooms array object"
classroom={};
classrooms=[];
@foreach($classrooms as $classroom)
    classroom={ id:{{ $classroom->id }}, course_type:"{{ $classroom->course_type }}", time:"{{ $classroom->time }}", starting_date:"{{ $classroom->starting_date }}", end_date:"{{ $classroom->end_date }}", teacher_name:"{{ App\Person::find($classroom->teacher_id)->name }}"};
    classrooms.push(classroom);
@endforeach
// when page load, student's course type had been clicked
if("{{ $student->classroom->course_type }}"=="A1"){
    var A1 = document.getElementById('A1');
    A1.click();
} else if ("{{ $student->classroom->course_type }}"=="A2"){
    var A2 = document.getElementById('A2');
    A2.click();
}else if ("{{ $student->classroom->course_type }}"=="B1"){
    var B1 = document.getElementById('B1');
    B1.click();
}else if ("{{ $student->classroom->course_type }}"=="B2"){
    var B2 = document.getElementById('B2');
    B2.click();
}else if ("{{ $student->classroom->course_type }}"=="C1"){
    var C1 = document.getElementById('C1');
    C1.click();
}else {
    var C1_plus = document.getElementById('C1_plus');
    C1_plus.click();
}
// when clicked course type radio button, classrooms were filtered according to course types
    function filter (course_type){
        document.getElementById("classrooms").options.length=0;
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
{{-- language dropdown is having "selected attirubute" according to value coming --}}
<script>
    student_language="{{ $student->languages }}";
    student_language_array=student_language.split(",")
        $(document).ready(function () {
            languages_option_length = document.getElementById("languages").options.length;
            for (i = 0; i < languages_option_length; i++) {
                for(z = 0; z < student_language_array.length; z++){
                    if (document.getElementById("languages").options[i].value == student_language_array[z]) {
                        document.getElementById("languages").options[i].setAttribute('selected', true);
                    }
                }
            }
        });
</script>
{{-- country dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        country_length = document.getElementById("country").options.length;
        for (i = 0; i < country_length; i++) {
            if (document.getElementById("country").options[i].value == "{{ $student->country }}") {
                document.getElementById("country").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- classroom dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        classrooms_length = document.getElementById("classrooms").options.length;
        for (i = 0; i < country_length; i++) {
            if (document.getElementById("classrooms").options[i].value == "{{ $student->classroom_id }}") {
                document.getElementById("classrooms").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- chidren age range dropdown is having "selected attirubute" according to value coming --}}
<script>
        $(document).ready(function () {
            children_age_range_length = document.getElementById("children_age_range").options.length;
            for (i = 0; i < children_age_range_length; i++) {
                if (document.getElementById("children_age_range").options[i].value == "{{ $student->children_age_range_status }}") {
                    document.getElementById("children_age_range").options[i].setAttribute('selected', true);
                }
            }
        });
</script>
{{-- mandatory fields --}}
<script>
    setInterval(function(){
        name=document.getElementById('name').value;
        e_mail=document.getElementById('e_mail').value;
        telephone=document.getElementById('telephone').value;
        birthdate=document.getElementById('birthdate').value;
        languages=document.getElementById('languages').value;
        classrooms_control=document.getElementById('classrooms').value;
        book_status_yes=document.getElementById('book_status_yes');
        book_status_no=document.getElementById('book_status_no');
        if(name=="" || e_mail=="" || telephone=="" ||  birthdate=="" || languages=="" || classrooms_control=="" || (book_status_yes.checked==false && book_status_no.checked==false)){
            document.getElementById("submit_button").disabled=true;
        } else {
            document.getElementById("submit_button").disabled=false;
        }
    }, 1000);
</script>
@endsection

@section('css')
{{-- country dropdown --}}
<link rel="stylesheet" href="{{ asset('css/extensions/bootstrap-formhelpers.min.css') }}">
@endsection