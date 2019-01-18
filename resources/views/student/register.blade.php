@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('student_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Öğrenci Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="name">*Adı:</label>
                            <input type="text" class="form-control" id="name" name="name">
                        </div>
                    </div>
                    <div class="col-3">
                        <div class="form-group">
                            <label for="email">*E-posta Adresi:</label>
                            <input type="email" class="form-control" id="email" name="e_mail">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="telephone">*Telefon:</label>
                            <input type="number" class="form-control" id="telephone" name="telephone">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="birthdate">*Doğum Tarihi:</label>
                            <input type="date" class="form-control" id="birthdate" name="birthdate">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="languages">*Konuştuğu Diller:</label>
                            <select class="form-control input-medium bfh-languages" data-language="US" name="languages[]" multiple></select>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div class="form-group">
                            <label for="country">Ülke:</label>
                            <select class="form-control input-medium bfh-countries" data-country="US" name="country"></select>
                        </div>
                    </div>
                    <div class="col-3">
                        <div>
                            <label>*Kur Tipi:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input onclick="filter('A1')" type="radio" class="form-check-input" name="course_type">A1</input>
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input onclick="filter('A2')" type="radio" class="form-check-input" name="course_type">A2
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input onclick="filter('B1')" type="radio" class="form-check-input" name="course_type">B1
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input onclick="filter('B2')" type="radio" class="form-check-input" name="course_type">B2
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input onclick="filter('C1')" type="radio" class="form-check-input" name="course_type">C1
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input onclick="filter('C1+')" type="radio" class="form-check-input" name="course_type">C1+
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="classrooms">*Sınıflar:</label>
                            <select class="form-control" id="classrooms" name="classrooms">
                                @foreach ($classrooms as $classroom)
                                <option value="{{ $classroom->id }}">{{ $classroom->time }} / {{ $classroom->starting_date }} / {{
                                    $classroom->end_date }} / {{ App\Person::find($classroom->teacher_id)->name }}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>*Kitap Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Evet" name="book_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Hayır" name="book_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Not:</label>
                        </div>
                        <div class="form-group">
                            <textarea class="form-control" rows="2" id="note" name="note"></textarea>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="card my-3">
            <div class="card-header">Kişisel İletişim Dinamikleri</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
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
                    <div class="col-2">
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
                    <div class="col-2">
                        <div>
                            <label>Üniversiteye Gitme Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Evet" name="university_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Hayır" name="university_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="university_department">Üniversite Bölümü:</label>
                            <input type="text" class="form-control" id="university_department" name="university_department">
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Yakın Üniversite Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Evet" name="relative_university_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Hayır" name="relative_university_status">Hayır
                            </label>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
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
                    <div class="col-2">
                        <div>
                            <label>Çocuk Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Evet" name="children_status">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" value="Hayır" name="children_status">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="children_number">Çocuk Sayısı:</label>
                            <input type="number" class="form-control" id="children_number" name="children_number">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="children_age_range">Çocuk Yaş Aralığı:</label>
                            <select class="form-control" id="children_age_range" name="children_age_range_status">
                                <option></option>
                                <option value="0-10 Yaş">0-10 Yaş</option>
                                <option value="10-20 Yaş">10-20 Yaş</option>
                                <option value="20-30 Yaş">20-30 Yaş</option>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="col-2">
                        <div>
                            <label>Online Ders Durumu:</label>
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
                    <div class="col-2">
                        <div>
                            <label>Vatandaşlık İşlem Yardımı:</label>
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
                    <div class="col-2">
                        <div>
                            <label>Ev Yardımı:</label>
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
                    <div class="col-2">
                        <div class="form-group">
                            <label for="heard_by">Duyduğu Yer:</label>
                            <input type="text" class="form-control" id="heard_by" name="heard_by">
                        </div>
                    </div>
                    <div class="col-2">
                        <div class="form-group">
                            <label for="demanded_education">Talep Edilen Eğitimler:</label>
                            <input type="text" class="form-control" id="demanded_education" name="demanded_education">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row my-3">
            <div class="col-12 d-flex justify-content-center">
                <button class="btn btn-primary" type="submit">Kaydet</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- country dropdown js --}}
<script src="{{ asset('js/extensions/bootstrap-formhelpers.min.js') }}"></script>
<script>
    $(function () {
        $(".bfh-countries option:nth-child(1)").attr("selected", "selected");
    });
</script>
{{-- disabled past or future for dates --}}
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
classroom={};
classrooms=[];
@foreach($classrooms as $classroom)
    classroom={ id:{{ $classroom->id }}, course_type:"{{ $classroom->course_type }}", time:"{{ $classroom->time }}", starting_date:"{{ $classroom->starting_date }}", end_date:"{{ $classroom->end_date }}", teacher_name:"{{ App\Person::find($classroom->teacher_id)->name }}"};
    classrooms.push(classroom);
@endforeach
console.log(classrooms[4].course_type);


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
    }
</script>
@endsection

@section('css')
{{-- country dropdown --}}
<link rel="stylesheet" href="{{ asset('css/extensions/bootstrap-formhelpers.min.css') }}">
@endsection