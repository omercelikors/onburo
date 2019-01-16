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
                            <label for="language">*Konuştuğu Diller:</label>
                            <select class="form-control input-medium bfh-languages" data-language="US" name="language"
                                multiple></select>
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
                                <option>{{ $classroom->time }} / {{ $classroom->starting_date }} / {{
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
                <div class="row my-2">
                    <div class="col-12 d-flex justify-content-center">
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#payment_modal">Ödeme</button>
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
                                <input type="radio" class="form-check-input" name="sex_status" name="sex_status_man">Erkek
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="sex_status" name="sex_status_girl">Kız
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Evlilik Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="marital_status_married">Evli
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="marital_status_bachelor">Bekar
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Üniversiteye Gitme Durumu:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="university_status_yes">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="university_status_no">Hayır
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
                                <input type="radio" class="form-check-input" name="relative_university_status_yes">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="relative_university_status_no">Hayır
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
                                <input type="radio" class="form-check-input" name="children_status_yes">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="children_status_no">Hayır
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
                            <select class="form-control" id="children_age_range" name="children_age_range">
                                <option></option>
                                <option>0-10 Yaş</option>
                                <option>10-20 Yaş</option>
                                <option>20-30 Yaş</option>
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
                                <input type="radio" class="form-check-input" name="online_lesson_status_yes">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="online_lesson_status_no">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Vatandaşlık İşlem Yardımı:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="citizenship_status_yes">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="citizenship_status_no">Hayır
                            </label>
                        </div>
                    </div>
                    <div class="col-2">
                        <div>
                            <label>Ev Yardımı:</label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="home_status_yes">Evet
                            </label>
                        </div>
                        <div class="form-check-inline">
                            <label class="form-check-label">
                                <input type="radio" class="form-check-input" name="home_status_no">Hayır
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
        <!-- The Payment Modal -->
        <div class="modal" id="payment_modal">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <!-- Modal Header -->
                    <div class="modal-header">
                        <h4 class="modal-title">Ödeme</h4>
                        <button type="button" class="close" data-dismiss="modal">&times;</button>
                    </div>
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="row">
                            <div class="col-3">
                                <div>
                                    <label>Para Birimi:</label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="currency_unit_tl">Türk
                                        Lirası
                                    </label>
                                </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" class="form-check-input" name="currency_unit_usd">Dolar
                                    </label>
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="debt_amount">Ödenecek Miktar:</label>
                                    <input type="text" class="form-control" id="debt_amount" name="debt_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="paid_amount">Ödenen Miktar:</label>
                                    <input type="text" class="form-control" id="paid_amount" name="paid_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="remaining_amount">Kalan Miktar:</label>
                                    <input type="text" class="form-control" id="remaining_amount" disabled name="remaining_amount">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment1_amount">Taksit-1 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment1_amount" name="installment1_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment1_date">Taksit-1 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment1_date" name="installment1_date">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment2_amount">Taksit-2 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment2_amount" name="installment2_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment2_date">Taksit-2 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment2_date" name="installment2_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment3_amount">Taksit-3 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment3_amount" name="installment3_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment3_date">Taksit-3 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment3_date" name="installment3_date">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment4_amount">Taksit-4 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment4_amount" name="installment4_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment4_date">Taksit-4 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment4_date" name="installment4_date">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment5_amount">Taksit-5 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment5_amount" name="installment5_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment5_date">Taksit-5 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment5_date" name="installment5_date">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment6_amount">Taksit-6 Miktarı:</label>
                                    <input type="text" class="form-control" id="installment6_amount" name="installment6_amount">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="installment6_date">Taksit-6 Tarihi:</label>
                                    <input type="date" class="form-control" id="installment6_date" name="installment6_date">
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Modal footer -->
                    <div class="modal-footer">
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Kapat</button>
                    </div>
                </div>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- country dropdown js --}}
<script src="{{ asset('js/extensions/bootstrap-formhelpers.min.js') }}"></script>
<script src="{{ asset('js/extensions/bootstrap-formhelpers-countries.en_US.js') }}"></script>
<script src="{{ asset('js/extensions/bootstrap-formhelpers-languages.en_US.js') }}"></script>
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
    document.getElementById("installment1_date").setAttribute("min", today);
    document.getElementById("installment2_date").setAttribute("min", today);
    document.getElementById("installment3_date").setAttribute("min", today);
    document.getElementById("installment4_date").setAttribute("min", today);
    document.getElementById("installment5_date").setAttribute("min", today);
    document.getElementById("installment6_date").setAttribute("min", today);
</script>
{{-- classrooms dropdown filter --}}
<script type="text/javascript">
    function filter (course_type){
        document.getElementById("classrooms").options.length=0;
        if(course_type=="A1"){
            a1_courses = [
            @foreach($a1_courses as $a1_course)
            ["{{ $a1_course->time }} / ", "{{ $a1_course->starting_date }} / ", "{{ $a1_course->end_date }} / ", "{{ App\Person::find($a1_course->teacher_id)->name }}"],
            @endforeach
            ];
            select = document.getElementById('classrooms');
            for (i = 0; i< a1_courses.length; i++){
                console.log(a1_courses[i]);
                var opt = document.createElement('option');
                opt.value = a1_courses[i];
                opt.innerHTML = a1_courses[i].join("");
                select.appendChild(opt);
            }
        }

        if(course_type=="A2"){
            a2_courses = [
            @foreach($a2_courses as $a2_course)
            ["{{ $a2_course->time }} / ", "{{ $a2_course->starting_date }} / ", "{{ $a2_course->end_date }} / ", "{{ App\Person::find($a2_course->teacher_id)->name }}"],
            @endforeach
            ];
            select = document.getElementById('classrooms');
            for (i = 0; i< a2_courses.length; i++){
                console.log(a2_courses[i]);
                var opt = document.createElement('option');
                opt.value = a2_courses[i];
                opt.innerHTML = a2_courses[i].join("");
                select.appendChild(opt);
            }
        }

        if(course_type=="B1"){
            b1_courses = [
            @foreach($b1_courses as $b1_course)
            ["{{ $b1_course->time }} / ", "{{ $b1_course->starting_date }} / ", "{{ $b1_course->end_date }} / ", "{{ App\Person::find($b1_course->teacher_id)->name }}"],
            @endforeach
            ];
            select = document.getElementById('classrooms');
            for (i = 0; i< b1_courses.length; i++){
                console.log(b1_courses[i]);
                var opt = document.createElement('option');
                opt.value = b1_courses[i];
                opt.innerHTML = b1_courses[i].join("");
                select.appendChild(opt);
            }
        }

        if(course_type=="B2"){
            b2_courses = [
            @foreach($b2_courses as $b2_course)
            ["{{ $b2_course->time }} / ", "{{ $b2_course->starting_date }} / ", "{{ $b2_course->end_date }} / ", "{{ App\Person::find($b2_course->teacher_id)->name }}"],
            @endforeach
            ];
            select = document.getElementById('classrooms');
            for (i = 0; i< b2_courses.length; i++){
                console.log(b2_courses[i]);
                var opt = document.createElement('option');
                opt.value = b2_courses[i];
                opt.innerHTML = b2_courses[i].join("");
                select.appendChild(opt);
            }
        }

        if(course_type=="C1"){
            c1_courses = [
            @foreach($c1_courses as $c1_course)
            ["{{ $c1_course->time }} / ", "{{ $c1_course->starting_date }} / ", "{{ $c1_course->end_date }} / ", "{{ App\Person::find($c1_course->teacher_id)->name }}"],
            @endforeach
            ];
            select = document.getElementById('classrooms');
            for (i = 0; i< c1_courses.length; i++){
                console.log(c1_courses[i]);
                var opt = document.createElement('option');
                opt.value = c1_courses[i];
                opt.innerHTML = c1_courses[i].join("");
                select.appendChild(opt);
            }
        }

        if(course_type=="C1+"){
            c1_plus_courses = [
            @foreach($c1_plus_courses as $c1_plus_course)
            ["{{ $c1_plus_course->time }} / ", "{{ $c1_plus_course->starting_date }} / ", "{{ $c1_plus_course->end_date }} / ", "{{ App\Person::find($c1_plus_course->teacher_id)->name }}"],
            @endforeach
            ];
            select = document.getElementById('classrooms');
            for (i = 0; i< c1_plus_courses.length; i++){
                console.log(c1_plus_courses[i]);
                var opt = document.createElement('option');
                opt.value = c1_plus_courses[i];
                opt.innerHTML = c1_plus_courses[i].join("");
                select.appendChild(opt);
            }
        }
    }
</script>
@endsection

@section('css')
{{-- country dropdown --}}
<link rel="stylesheet" href="{{ asset('css/extensions/bootstrap-formhelpers.min.css') }}">
@endsection