@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('candidate_student_edit_register') }}" enctype="multipart/form-data">
        @csrf
        <input type="hidden" class="form-control" name="candidate_student_id" value="{{ $candidate_student->id }}">
        <div class="card my-3">
            <div class="card-header">Aday Öğrenci Düzenle</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-12">
                        <legend style="width:9%;">Kişisel Bilgiler</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="name">*Adı:</label>
                                    <input type="text" class="form-control" value="{{ $candidate_student->name }}" id="name" name="name">
                                </div>
                            </div>
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="e_mail">*E-posta Adresi:</label>
                                    <input type="email" class="form-control" id="e_mail" value="{{ $candidate_student->e_mail }}" name="e_mail">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="telephone">*Telefon:</label>
                                    <input type="number" class="form-control" id="telephone" value="{{ $candidate_student->telephone }}"name="telephone">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="birthdate">*Doğum Tarihi:</label>
                                    <input type="date" class="form-control" id="birthdate" value="{{ $candidate_student->birthdate() }}" name="birthdate">
                                </div>
                            </div>
                            <div class="col-2">
                                <div class="form-group">
                                    <label for="country">Ülke:</label>
                                    <select id="country" class="form-control input-medium bfh-countries" data-country="US" name="country"></select>
                                </div>
                            </div>
                    </fieldset>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <fieldset class="col-7">
                        <legend style="width:7%;">Diğer</legend>
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-3">
                                <div class="form-group">
                                    <label for="demanded_education">Talep Edilen Eğitimler:</label>
                                    <input type="text" class="form-control" id="demanded_education" value="{{ $candidate_student->demanded_education }}" name="demanded_education">
                                </div>
                            </div>
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="note">Not:</label>
                                    <textarea class="form-control" rows="5" id="note" name="note">{{ $candidate_student->note }}</textarea>
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
{{-- country dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        country_length = document.getElementById("country").options.length;
        for (i = 0; i < country_length; i++) {
            if (document.getElementById("country").options[i].value == "{{ $candidate_student->country }}") {
                document.getElementById("country").options[i].setAttribute('selected', true);
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
        if(name=="" || e_mail=="" || telephone=="" ||  birthdate==""){
            document.getElementById("submit_button").disabled=true;
        } else {
            document.getElementById("submit_button").disabled=false;
        }
    }, 1000);
</script>
@endsection

@section('css')

@endsection