@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('student_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Öğrenci Kayıt</div>
            <div class="card-body">

                <div class="row d-flex justify-content-center my-2">
                    <div class="card col-8 px-0 my-3">
                        <div class="card-header">Kişisel Bilgiler</div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="surname">*Soyadı:</label>
                                        <input type="text" class="form-control" id="surname" name="surname" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="e_mail">*E-posta Adresi:</label>
                                        <input type="email" class="form-control" id="e_mail" name="e_mail" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="telephone">*Telefon:</label>
                                        <input type="number" class="form-control" id="telephone" name="telephone"
                                            required>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-3">
                                    <label for="birthdate">*Doğum Tarihi:</label>
                                    <div class="gj-margin-top-10">
                                        <input id="birthdate" name="birthdate" autocomplete="off" placeholder="gg.dd.yyyy" required>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="languages">*Konuştuğu Diller:</label>
                                        <select id="languages" class="form-control input-medium bfh-languages"
                                            data-language="US" name="languages[]" multiple required></select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="countries">Ülke:</label>
                                        <select class="form-control input-medium bfh-countries" data-country="US" name="countries"></select>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div>
                                        <label>*Kitap aldı mı?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" id="book_status_yes" class="form-check-input" value="Evet"
                                                name="book_status" required>Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" id="book_status_no" class="form-check-input" value="Hayır"
                                                name="book_status" required>Hayır
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="country">Acente:</label>
                                        <select id="agency" class="form-control" name="agency">
                                            <option value=""></option>
                                            @foreach($agencies as $agency)
                                                <option value="{{ $agency->id }}">{{ $agency->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="why_choose_us">Neden bizi tercih etti?:</label>
                                        <textarea class="form-control" rows="5" id="why_choose_us" name="why_choose_us"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-center my-2">
                    <div class="card col-8 my-3 px-0">
                        <div class="card-header">Sınıflar</div>
                        <div class="card-body">
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-7">
                                    <div>
                                        <label>Kurs Tipi(<small>Sınıfları kurs tipini seçerek filitreyebilirsiniz</small>):</label>
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
                            </div>
                            <div class="row d-flex justify-content-center my-2">
                                <div class="col-7">
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
                    <div class="card col-4 my-3 px-0">
                        <div class="card-header">Cinsiyet-Evlilik</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-4">
                                    <div>
                                        <label>Cinsiyet:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Erkek" name="sex_status">Erkek
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Kız" name="sex_status">Kız
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <label>Evlilik Durumu:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evli" name="marital_status">Evli
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Bekar" name="marital_status">Bekar
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-8 my-3 px-0">
                        <div class="card-header">Üniversite ve Çocuk Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-3">
                                    <div>
                                        <label>Üniversiteye gitmek isiyor mu?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="university_status_yes" type="radio" class="form-check-input"
                                                value="Evet" name="university_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="university_status_no" type="radio" class="form-check-input"
                                                value="Hayır" name="university_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="university_department">Hangi bölümde okumak istiyor?:</label>
                                        <input id="university_department" type="text" class="form-control" id="university_department"
                                            name="university_department">
                                    </div>
                                </div>
                                <div class="col-3">
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
                                <div class="col-3">
                                    <div>
                                        <label>Çocuk Durumu:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="children_status_yes" type="radio" class="form-check-input" value="Evet"
                                                name="children_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="children_status_no" type="radio" class="form-check-input" value="Hayır"
                                                name="children_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="children_number">Çocuk Sayısı:</label>
                                        <input type="number" class="form-control" id="children_number" name="children_number">
                                    </div>
                                </div>
                                <div class="col-3">
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
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="note">Not:</label>
                                        <textarea class="form-control" rows="5" id="note" name="note"></textarea>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-9 my-3 px-0">
                        <div class="card-header">Yakın Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-4">
                                    <div>
                                        <label>Üniversiteye gitmek isteyen yakını var mı?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="relative_university_status_yes" type="radio" class="form-check-input"
                                                value="Evet" name="relative_university_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input id="relative_university_status_no" type="radio" class="form-check-input"
                                                value="Hayır" name="relative_university_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="relative_name">Yakın İsmi:</label>
                                        <input type="text" class="form-control" id="relative_name" name="relative_name">
                                    </div>
                                </div>
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="relative_telephone">Yakın Telefonu:</label>
                                        <input type="number" class="form-control" id="relative_telephone" name="relative_telephone">
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="relative_education_level_status">Almayı düşündüğü eğitim:</label>
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
                    <div class="card col-9 my-3 px-0">
                        <div class="card-header">Diğer Bilgiler</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-3">
                                    <div>
                                        <label>Online ders istiyor mu?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evet" name="online_lesson_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Hayır" name="online_lesson_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <label>Vatandaşlık işlemleri için yardım istiyor mu?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evet" name="citizenship_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Hayır" name="citizenship_status">Hayır
                                        </label>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div>
                                        <label>Ev almak veya kiralamak için yardım istiyor mu?:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evet" name="home_status">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Hayır" name="home_status">Hayır
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-4 d-flex justify-content-center">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="heard_by_status">Bizi nereden duydu?:</label>
                                        <select class="form-control" id="heard_by_status" name="heard_by_status">
                                            <option></option>
                                            <option>Google</option>
                                            <option>Instagram</option>
                                            <option>Facebook</option>
                                            <option>Diğer</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="heard_by">Bizi nereden duydu?(Diğer):</label>
                                        <input type="text" class="form-control" id="heard_by_other" name="heard_by_other">
                                    </div>
                                </div>
                                <div class="col-4">
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
                <button id="submit_button" class="btn btn-primary" type="submit">Kaydet</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- country dropdown js --}}
<script src="{{ asset('js/extensions/bootstrap-formhelpers.min.js') }}"></script>
{{-- classrooms dropdown filter according to "course types" --}}
<script type="text/javascript">
    //all classrooms were received "classrooms array object"
    classroom={};
    classrooms=[];
    @foreach($classrooms as $classroom)
        classroom={ id:{{ $classroom->id }}, course_type:"{{ $classroom->course_type }}", time:"{{ $classroom->time }}", starting_date:"{{ $classroom->starting_date() }}", end_date:"{{ $classroom->end_date() }}", teacher_name:"{{ $classroom->teacher_name() }}", teacher_surname:"{{ $classroom->teacher_surname() }}"};
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
                if(classrooms[i].course_type=="YOS"){
                    var opt = document.createElement('option');
                    opt.value = classrooms[i].id;
                    opt.innerHTML = classrooms[i].time + " / " + classrooms[i].starting_date+ " / " + classrooms[i].end_date + " / " + classrooms[i].teacher_name + " " + classrooms[i].teacher_surname;
                    select.appendChild(opt);
                }
            }
        }

        if(course_type=="Diger"){
            for (i = 0; i< classrooms.length; i++){
                if(classrooms[i].course_type=="Diger"){
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
    setInterval(function(){ 

        if(university_status_yes.checked==false && university_status_no.checked==false){
            $('#university_department').attr("disabled", true);
            $('#education_level_status').attr("disabled", true);
            $('#relative_university_status_yes').attr("disabled", true);
            $('#relative_university_status_no').attr("disabled", true);
            $('#relative_name').attr("disabled", true);
            $('#relative_telephone').attr("disabled", true);
            $('#relative_education_level_status').attr("disabled", true);
        }else if(university_status_yes.checked==true){
            $('#university_department').attr("disabled", false);
            $('#education_level_status').attr("disabled", false);
            $('#relative_university_status_yes').attr("disabled", true);
            $('#relative_university_status_no').attr("disabled", true);
            $('#relative_name').attr("disabled", true);
            $('#relative_telephone').attr("disabled", true);
            $('#relative_education_level_status').attr("disabled", true);
            relative_university_status_yes.checked=false;
            relative_university_status_no.checked=false;
            $('#relative_name').val("");
            $('#relative_telephone').val("");
            $('#relative_education_level_status').val("");
        }else if(university_status_no.checked==true){
            $('#university_department').attr("disabled", true);
            $('#education_level_status').attr("disabled", true);
            $('#university_department').val("");
            $('#education_level_status').val("");
            $('#relative_university_status_yes').attr("disabled", false);
            $('#relative_university_status_no').attr("disabled", false);
            if(relative_university_status_yes.checked==true){
                $('#university_department').attr("disabled", true);
                $('#education_level_status').attr("disabled", true);
                $('#university_department').val("");
                $('#education_level_status').val("");
                $('#relative_name').attr("disabled", false);
                $('#relative_telephone').attr("disabled", false);
                $('#relative_education_level_status').attr("disabled", false);
            }else if(relative_university_status_no.checked==true){
                $('#university_department').attr("disabled", true);
                $('#education_level_status').attr("disabled", true);
                $('#university_department').val("");
                $('#education_level_status').val("");
                $('#relative_name').attr("disabled", true);
                $('#relative_telephone').attr("disabled", true);
                $('#relative_education_level_status').attr("disabled", true);
                $('#relative_name').val("");
                $('#relative_telephone').val("");
                $('#relative_education_level_status').val("");
            }
        }
    }, 1000);
</script>
<script>
    children_status_yes=document.getElementById('children_status_yes');
    children_status_no=document.getElementById('children_status_no');
    children_number=document.getElementById('children_number');
    children_age_range_status=document.getElementById('children_age_range_status');
    setInterval(function(){

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
    }, 1000);
</script>
<script>
    heard_by_status=document.getElementById('heard_by_status');
    heard_by_other=document.getElementById('heard_by_other');
    setInterval(function(){
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
        maxDate: today
    });
</script>
@endsection

@section('css')
{{-- country dropdown --}}
<link rel="stylesheet" href="{{ asset('css/extensions/bootstrap-formhelpers.min.css') }}">
@endsection