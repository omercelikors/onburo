@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('recruitment.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Temin Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-11 px-0 my-3">
                        <div class="card-header">Temin Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" class="form-control"
                                            oninput="this.value = this.value.toUpperCase()" id="name" name="name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control"
                                            oninput="this.value = this.value.toUpperCase()" id="surname" name="surname"
                                            required>
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
                                        <input type="number" class="form-control" id="telephone" name="telephone"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="country">Ülke:</label>
                                        <select class="form-control input-medium bfh-countries" data-country="US"
                                            name="country"></select>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="university">Üniversite:</label>
                                        <select class="form-control" id="university" name="university">
                                            <option></option>
                                            @foreach ($universities as $university)
                                                <option>{{ $university->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="branch">Bölüm:</label>
                                        <select class="form-control" id="branch" name="branch">
                                            <option></option>
                                            @foreach ($university_branches as $university_branch)
                                                <option>{{ $university_branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="learning_language">Öğrenim Dili:</label>
                                        <select class="form-control" id="learning_language" name="learning_language">
                                            <option></option>
                                            <option>Türkçe</option>
                                            <option>İngilizce</option>
                                            <option>Diğer Diller</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="degree">Derece:</label>
                                        <select class="form-control" id="degree" name="degree">
                                            <option></option>
                                            <option>Ön Lisans</option>
                                            <option>Lisans</option>
                                            <option>Yüksek Lisans</option>
                                            <option>Doktora</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="application_status">Başvuru Durumu:</label>
                                        <select class="form-control" id="application_status" name="application_status">
                                            <option></option>
                                            <option>Online başvuru yaptı</option>
                                            <option>Ofiste bilgi verildi</option>
                                            <option>Evrak alındı</option>
                                            <option>Evrak üniversiteye iletildi</option>
                                            <option>Başvurusu yapıldı</option>
                                            <option>Başvurusu onaylandı</option>
                                            <option>Öğrenci ön ödemeyi yaptı</option>
                                            <option>Öğrenci kabul mektubu aldı</option>
                                            <option>Kayıt tamamlandı</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="heard_by">Bizi Nereden Duydu?:</label>
                                        <select class="form-control" id="heard_by" name="heard_by">
                                            <option></option>
                                            <option>Google/Reklam</option>
                                            <option>Reklam</option>
                                            <option>Facebook</option>
                                            <option>Tavsiye</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="agency">Acente:</label>
                                        <select class="form-control" id="agency" name="agency">
                                            <option></option>
                                            @foreach ($agencies as $agency)
                                                <option>{{ $agency->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div>
                                        <label>Ücretli Danışmanlık:</label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Evet"
                                                name="consultancy">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" value="Hayır"
                                                name="consultancy">Hayır
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="note">Not:</label>
                                        <textarea class="form-control" rows="5" id="notes" name="notes"></textarea>
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
@section('title', "Temin Kaydet")
