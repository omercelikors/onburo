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
                    <div class="card col-11 px-0 my-3">
                        <div class="card-header">Kişisel Bilgiler</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control" value="{{ $candidate_student->name }}" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control" id="surname" oninput="this.value = this.value.toUpperCase()" value="{{ $candidate_student->surname }}" name="surname" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="e_mail">E-posta Adresi:</label>
                                        <input type="email" class="form-control" id="e_mail" value="{{ $candidate_student->e_mail }}" name="e_mail">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="telephone">*Telefon:</label>
                                        <input type="number" class="form-control" id="telephone" value="{{ $candidate_student->telephone }}"name="telephone" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="country">Ülke:</label>
                                        <select id="country" class="form-control input-medium bfh-countries" data-country="US" name="country"></select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-10 px-0 my-3">
                        <div class="card-header">Diğer Bilgiler</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <div class="form-group">
                                            <label for="heard_by">Başka bir kurs istiyor mu?:</label>
                                            <input type="text" class="form-control" id="demanded_education_status" name="demanded_education_status" value="{{ $candidate_student->demanded_education_status }}">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-7">
                                    <div class="form-group">
                                        <label for="note">Not:</label>
                                        <textarea class="form-control" rows="10" id="note" name="note">{{ $candidate_student->note }}</textarea>
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
{{-- country dropdown js --}}
<script src="{{ asset('js/extensions/bootstrap-formhelpers.min.js') }}"></script>
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
{{-- demanded education status dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        demanded_education_status_length = document.getElementById("demanded_education_status").options.length;
        for (i = 0; i < demanded_education_status_length; i++) {
            if (document.getElementById("demanded_education_status").options[i].value == "{{ $candidate_student->demanded_education_status }}") {
                document.getElementById("demanded_education_status").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
@endsection

@section('css')

@endsection
@section('title', "Aday Öğrenci Düzenle")
