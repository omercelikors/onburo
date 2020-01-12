@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('student_edit_register') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="student_id" value="{{ $student->id }}">
        <div class="card my-3">
            <div class="card-header">Öğrenci Düzenle</div>
            <div class="card-body">
                <div class="row d-flex justify-content-center my-2">
                    <div class="card col-12 col-md-12 col-xl-8 px-0 my-3">
                        <div class="card-header">Kişisel Bilgiler</div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" id="name" name="name" value="{{ $student->name }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="surname">*Soyadı:</label>
                                        <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" id="surname" name="surname" value="{{ $student->surname }}" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="e_mail">E-posta Adresi:</label>
                                        <input type="email" class="form-control" id="e_mail" name="e_mail" value="{{ $student->e_mail }}">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="telephone">*Telefon:</label>
                                        <input type="number" class="form-control" id="telephone" value="{{ $student->telephone }}" name="telephone"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-12 col-md-3 col-xl-3">
                                    <label for="birthdate">*Doğum Tarihi:</label>
                                    <div class="gj-margin-top-10">
                                        <input id="birthdate" name="birthdate" autocomplete="off" value="{{ $student->birthdate() }}"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="languages">*Konuştuğu Diller:</label>
                                        <select id="languages" class="form-control" name="languages[]" multiple required>
                                            <option></option>
                                            <option>İngilizce</option>
                                            <option>Arapça</option>
                                            <option>Farsça</option>
                                            <option>Rusça</option>
                                            <option>Çince</option>
                                            <option>Hintçe</option>
                                            <option>İspanyolca</option>
                                            <option>Fransızca</option>
                                            <option>Diğer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="countries">Ülke:</label>
                                        <select class="form-control input-medium bfh-countries" id="countries" data-country="US" name="countries"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="agency">Acente:</label>
                                        <select id="agency" class="form-control" name="agency">
                                            <option value=""></option>
                                            @foreach($agencies as $agency)
                                                <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="why_abandon_us_status">Neden bizden ayrılmak istiyor?:</label>
                                        <select class="form-control" id="why_abandon_us_status" name="why_abandon_us_status">
                                            <option></option>
                                            <option>Hoca Sorunu</option>
                                            <option>Ücret Sorunu</option>
                                            <option>Kişisel Nedenler</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-5 col-xl-3">
                                    <div class="form-group">
                                        <label for="why_abandon_us">Ayrılma nedeni açıklaması:</label>
                                        <textarea class="form-control" rows="5" id="why_abandon_us_note" name="why_abandon_us_note">{{ $student->why_abandon_us_note }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center my-2">
                    <div class="card col-12 col-md-12 col-xl-8 my-3 px-0">
                        <div class="card-header">Sınıflar</div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-12 col-md-8 col-xl-7">
                                    <div>
                                        <label>Kurs Tipi(<small>Sınıfları kurs tipini seçerek filitreyebilirsiniz</small>):</label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('A1')" id="A1" type="radio" class="form-check-input" name="course_type">A1
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('A2')" type="radio" id="A2" class="form-check-input" name="course_type">A2
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('B1')" type="radio" id="B1"  class="form-check-input" name="course_type">B1
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('B2')" type="radio" id="B2"  class="form-check-input" name="course_type">B2
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('C1')" type="radio" id="C1"  class="form-check-input" name="course_type">C1
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('C1+')" type="radio" id="C1+"  class="form-check-input" name="course_type">C1+
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('YOS')" id="YOS" type="radio" id="YOS"  class="form-check-input" name="course_type">YÖS
                                        </label>
                                    </div>
                                    <div class="form-check-inline mr-1">
                                        <label class="form-check-label">
                                            <input onclick="filter('Diger')" id="Diger" type="radio" id="Diger" class="form-check-input" name="course_type">Diğer
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input onclick="filter('All')" type="radio" id="all" class="form-check-input"
                                                name="course_type">All
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-12 col-md-8 col-xl-7">
                                    <div class="form-group">
                                        <label for="classrooms">Sınıflar:</label>
                                        <select class="form-control" id="classrooms" name="classrooms"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="card my-3">
            <div class="card-header">Kişisel İletişim Dinamikleri</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-12 col-xl-4 my-3 px-0">
                        <div class="card-header">Cinsiyet-Evlilik</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-4 col-xl-4">
                                    <div>
                                        <label>Cinsiyet:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Erkek" @if($student->sex_status=="Erkek") checked @endif name="sex_status">Erkek
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Kız" @if($student->sex_status=="Kız") checked @endif name="sex_status">Kız
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-xl-4">
                                    <div>
                                        <label>Evlilik Durumu:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evli" @if($student->marital_status=="Evli") checked @endif name="marital_status">Evli
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Bekar" @if($student->marital_status=="Bekar") checked @endif name="marital_status">Bekar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-12 col-xl-8 my-3 px-0">
                        <div class="card-header">Üniversite ve Çocuk Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div>
                                        <label>Üniversiteye gitmek isiyor mu?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="university_status_yes" type="radio" class="form-check-input"
                                                value="Evet" @if($student->university_status=="Evet") checked @endif name="university_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="university_status_no" type="radio" class="form-check-input"
                                                value="Hayır" @if($student->university_status=="Hayır") checked @endif name="university_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="university_department">Hangi bölümde okumak istiyor?:</label>
                                        <input id="university_department" type="text" class="form-control" id="university_department"
                                            value="{{ $student->university_department }}" name="university_department">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="education_level_status">Almayı düşündüğü eğitim:</label>
                                        <select class="form-control" id="education_level_status" name="education_level_status">
                                            <option></option>
                                            <option>Önlisans</option>
                                            <option>Lisans</option>
                                            <option>Yüksek Lisans</option>
                                            <option>Doktora</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div>
                                        <label>Çocuk Durumu:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="children_status_yes" type="radio" class="form-check-input" value="Evet"
                                            @if($student->children_status=="Evet") checked @endif name="children_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="children_status_no" type="radio" class="form-check-input" value="Hayır"
                                            @if($student->children_status=="Hayır") checked @endif name="children_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="children_number">Çocuk Sayısı:</label>
                                        <input type="number" class="form-control" id="children_number" value="{{ $student->children_number }}" name="children_number">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="children_age_range_status">Çocuk Yaş Aralığı:</label>
                                        <select class="form-control" id="children_age_range_status" name="children_age_range_status[]"
                                            multiple>
                                            <option></option>
                                            <option>0-10 Yaş</option>
                                            <option>10-15 Yaş</option>
                                            <option>15-20 Yaş</option>
                                            <option>20 ve daha büyük</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-5 col-xl-3">
                                    <div class="form-group">
                                        <label for="note">Not:</label>
                                        <textarea class="form-control" rows="5" id="note" name="note">{{ $student->note }}</textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-12 col-xl-9 my-3 px-0">
                        <div class="card-header">Yakın Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-3 col-xl-4">
                                    <div>
                                        <label>Üniversiteye gitmek isteyen yakını var mı?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="relative_university_status_yes" type="radio" class="form-check-input"
                                                value="Evet" @if($student->relative_university_status=="Evet") checked @endif name="relative_university_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="relative_university_status_no" type="radio" class="form-check-input"
                                                value="Hayır" @if($student->relative_university_status=="Hayır") checked @endif name="relative_university_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="relative_name">Yakın İsmi:</label>
                                        <input type="text" class="form-control" id="relative_name" value="{{ $student->relative_name }}" name="relative_name">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="relative_telephone">Yakın Telefonu:</label>
                                        <input type="number" class="form-control" id="relative_telephone" value="{{ $student->relative_telephone }}" name="relative_telephone">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="education_level_status">Almayı düşündüğü eğitim:</label>
                                        <select class="form-control" id="relative_education_level_status" name="relative_education_level_status">
                                            <option></option>
                                            <option>Önlisans</option>
                                            <option>Lisans</option>
                                            <option>Yüksek Lisans</option>
                                            <option>Doktora</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-12 col-xl-9 my-3 px-0">
                        <div class="card-header">Diğer Bilgiler</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-3">
                                    <div>
                                        <label>Online ders istiyor mu?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evet" @if($student->online_lesson_status=="Evet") checked @endif name="online_lesson_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Hayır" @if($student->online_lesson_status=="Hayır") checked @endif name="online_lesson_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div>
                                        <label>Vatandaşlık işlemleri için yardım istiyor mu?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evet" @if($student->citizenship_status=="Evet") checked @endif name="citizenship_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Hayır" @if($student->citizenship_status=="Hayır") checked @endif name="citizenship_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div>
                                        <label>Ev almak veya kiralamak için yardım istiyor mu?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evet" @if($student->home_status=="Evet") checked @endif name="home_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Hayır" @if($student->home_status=="Hayır") checked @endif name="home_status">Hayır
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-4 d-flex justify-content-center">
                                <div class="col-12 col-md-3 col-xl-3">
                                    <div class="form-group">
                                        <label for="heard_by_status">Bizi nereden duydu?:</label>
                                        <select class="form-control" id="heard_by_status" name="heard_by_status">
                                            <option></option>
                                            <option>Google</option>
                                            <option>Instagram</option>
                                            <option>Facebook</option>
                                            <option>Tavsiye</option>
                                            <option>Diğer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="heard_by">Bizi nereden duydu?(Diğer):</label>
                                        <input type="text" class="form-control" id="heard_by_other" value="{{ $student->heard_by_other }}" name="heard_by_other">
                                    </div>
                                </div>
                                <div class="col-12 col-md-4 col-xl-4">
                                    <div class="form-group">
                                        <label for="demanded_education_status">Başka bir kurs istiyor mu?:</label>
                                        <select class="form-control" id="demanded_education_status" name="demanded_education_status">
                                            <option></option>
                                            <option>YÖS</option>
                                            <option>Online</option>
                                            <option>Diğer Diller</option>
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
                <button id="submit_button" class="btn btn-primary" type="submit">Düzenle</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- countries dropdown js --}}
<script src="{{ asset('js/extensions/bootstrap-formhelpers.min.js') }}"></script>
{{-- classrooms dropdown filter --}}
<script type="text/javascript">
    //all classrooms were received "classrooms array object"
    classroom={};
    classrooms=[];
    @if(isset($classrooms))
        @foreach($classrooms as $classroom)
            classroom={ id:"{{ $classroom->id }}", course_type:"{{ $classroom->course_type }}", time:"{{ $classroom->time }}", starting_date:"{{ $classroom->starting_date() }}", end_date:"{{ $classroom->end_date() }}", teacher_name:"{{ $classroom->teacher_name() }}", teacher_surname:"{{ $classroom->teacher_surname() }}"};
            classrooms.push(classroom);
        @endforeach
    @if(isset($student->classroom))
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
        }else if ("{{ $student->classroom->course_type }}"=="C1+") {
            var C1_plus = document.getElementById('C1_plus');
            C1_plus.click();
        }else if ("{{ $student->classroom->course_type }}"=="YÖS") {
            var YOS = document.getElementById('YOS');
            YOS.click();
        }else if ("{{ $student->classroom->course_type }}"=="Diğer") {
            var Diger = document.getElementById('Diger');
            Diger.click();
        }
    @endif
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
@endif
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
{{-- education level status dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        why_abandon_us_status_length = document.getElementById("why_abandon_us_status").options.length;
        for (i = 0; i < why_abandon_us_status_length; i++) {
            if (document.getElementById("why_abandon_us_status").options[i].value == "{{ $student->why_abandon_us_status }}") {
                document.getElementById("why_abandon_us_status").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- education level status dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        education_level_status_length = document.getElementById("education_level_status").options.length;
        for (i = 0; i < education_level_status_length; i++) {
            if (document.getElementById("education_level_status").options[i].value == "{{ $student->education_level_status }}") {
                document.getElementById("education_level_status").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- agency dropdown is having "selected attirubute" according to value coming --}}
<script>
        $(document).ready(function () {
            agency_length = document.getElementById("agency").options.length;
            for (i = 0; i < agency_length; i++) {
                if (document.getElementById("agency").options[i].value == "{{ $student->agency_id }}") {
                    document.getElementById("agency").options[i].setAttribute('selected', true);
                }
            }
        });
</script>
{{-- relative education level status dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        relative_education_level_status_length = document.getElementById("relative_education_level_status").options.length;
        for (i = 0; i < relative_education_level_status_length; i++) {
            if (document.getElementById("relative_education_level_status").options[i].value == "{{ $student->relative_education_level_status }}") {
                document.getElementById("relative_education_level_status").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- heard by status dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        heard_by_status_length = document.getElementById("heard_by_status").options.length;
        for (i = 0; i < heard_by_status_length; i++) {
            if (document.getElementById("heard_by_status").options[i].value == "{{ $student->heard_by_status }}") {
                document.getElementById("heard_by_status").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- demanded education status dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        demanded_education_status_length = document.getElementById("demanded_education_status").options.length;
        for (i = 0; i < demanded_education_status_length; i++) {
            if (document.getElementById("demanded_education_status").options[i].value == "{{ $student->demanded_education_status }}") {
                document.getElementById("demanded_education_status").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- chidren age range status dropdown is having "selected attirubute" according to value coming --}}
<script>
    children_age_range_status="{{ $student->children_age_range_status }}";
    children_age_range_status_array=children_age_range_status.split(",")
        $(document).ready(function () {
            children_age_range_status_length = document.getElementById("children_age_range_status").options.length;
            for (i = 0; i < children_age_range_status_length; i++) {
                for(z = 0; z < children_age_range_status_array.length; z++){
                    if (document.getElementById("children_age_range_status").options[i].value == children_age_range_status_array[z]) {
                        document.getElementById("children_age_range_status").options[i].setAttribute('selected', true);
                    }
                }
            }
        });
</script>
{{-- countries dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        countries_length = document.getElementById("countries").options.length;
        for (i = 0; i < countries_length; i++) {
            if (document.getElementById("countries").options[i].value == "{{ $student->country }}") {
                document.getElementById("countries").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
{{-- classroom dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        classrooms_length = document.getElementById("classrooms").options.length;
        for (i = 0; i < classrooms_length; i++) {
            if (document.getElementById("classrooms").options[i].value == "{{ $student->classroom_id }}") {
                document.getElementById("classrooms").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
<script>
        university_status_yes=document.getElementById('university_status_yes');
        university_status_no=document.getElementById('university_status_no');
        university_department=document.getElementById('university_department');
        education_level_status=document.getElementById('education_level_status');
        relative_university_status_yes=document.getElementById('relative_university_status_yes');
        relative_university_status_no=document.getElementById('relative_university_status_no');
        relative_name=document.getElementById('relative_name');
        relative_telephone=document.getElementById('relative_telephone');
        relative_education_level_status=document.getElementById('relative_education_level_status');
        children_status_yes=document.getElementById('children_status_yes');
        children_status_no=document.getElementById('children_status_no');
        children_number=document.getElementById('children_number');
        children_age_range_status=document.getElementById('children_age_range_status');
        heard_by_status=document.getElementById('heard_by_status');
        heard_by_other=document.getElementById('heard_by_other');
        setInterval(function(){

            if(university_status_yes.checked==false && university_status_no.checked==false){
                $('#university_department').attr("disabled", true);
                $('#education_level_status').attr("disabled", true);
            }else if(university_status_yes.checked==true){
                $('#university_department').attr("disabled", false);
                $('#education_level_status').attr("disabled", false);
            }else if(university_status_no.checked==true){
                $('#university_department').attr("disabled", true);
                $('#education_level_status').attr("disabled", true);
                $('#university_department').val("");
                $('#education_level_status').val("");
            }

            if(relative_university_status_yes.checked==false && relative_university_status_no.checked==false){
                $('#relative_name').attr("disabled", true);
                $('#relative_telephone').attr("disabled", true);
                $('#relative_education_level_status').attr("disabled", true);
            }else if(relative_university_status_yes.checked==true){
                $('#relative_name').attr("disabled", false);
                $('#relative_telephone').attr("disabled", false);
                $('#relative_education_level_status').attr("disabled", false);
            }else if(relative_university_status_no.checked==true){
                $('#relative_name').attr("disabled", true);
                $('#relative_telephone').attr("disabled", true);
                $('#relative_education_level_status').attr("disabled", true);
                $('#relative_name').val("");
                $('#relative_telephone').val("");
                $('#relative_education_level_status').val("");
            }

            if(children_status_yes.checked==false && children_status_no.checked==false){
                $('#children_number').attr("disabled", true);
                $('#children_age_range_status').attr("disabled", true);
            }else if(children_status_yes.checked==true){
                $('#children_number').attr("disabled", false);
                $('#children_age_range_status').attr("disabled", false);
            }else if(children_status_no.checked==true){
                $('#children_number').attr("disabled", true);
                $('#children_age_range_status').attr("disabled", true);
                $('#children_number').val("");
                $('#children_age_range_status').val("");
            }

            if(heard_by_status.value=="Diğer"){
                $('#heard_by_other').attr("disabled", false);
            }else if(heard_by_status.value!="Diğer"){
                $('#heard_by_other').attr("disabled", true);
                $('#heard_by_other').val("");
            }

        }, 1000);
</script>
<script>
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#birthdate').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1
    });
</script>
@endsection

@section('css')
{{-- countries dropdown --}}
<link rel="stylesheet" href="{{ asset('css/extensions/bootstrap-formhelpers.min.css') }}">
@endsection
@section('title', "Öğrenci Düzenle")
