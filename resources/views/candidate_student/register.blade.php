@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('candidate_student_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Aday Öğrenci Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-11 px-0 my-3">
                        <div class="card-header">Kişisel Bilgiler</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" oninput="this.value = this.value.toUpperCase()" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" id="surname" name="surname" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="e_mail">E-posta Adresi:</label>
                                        <input type="email" class="form-control" id="e_mail" name="e_mail">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="telephone">*Telefon:</label>
                                        <input type="text" class="form-control" id="telephone" name="telephone" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="country">Ülke:</label>
                                        <select class="form-control input-medium bfh-countries" data-country="US" name="country"></select>
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
                                            <input type="text" class="form-control" id="demanded_education_status" name="demanded_education_status">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-6 col-xl-7">
                                    <div class="form-group">
                                        <label for="note">Not:</label>
                                        <textarea class="form-control" rows="10" id="note" name="note"></textarea>
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
@endsection

@section('css')

@endsection
@section('title', "Aday Öğrenci Kaydet")
