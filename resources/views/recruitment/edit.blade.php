@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('recruitment.update',['recruitment'=>$recruitment->id]) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="card my-3">
            <div class="card-header">Aday Öğrenci Kayıt</div>
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
                                            oninput="this.value = this.value.toUpperCase()" value="{{ $recruitment->name }}" id="name" name="name"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control"
                                            oninput="this.value = this.value.toUpperCase()" value="{{ $recruitment->surname }}" id="surname" name="surname"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="e_mail">E-posta Adresi:</label>
                                        <input type="email" class="form-control" id="e_mail" value="{{ $recruitment->e_mail }}" name="e_mail">
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="telephone">Telefon:</label>
                                        <input type="number" class="form-control" id="telephone" value="{{ $recruitment->telephone }}" name="telephone"
                                            required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="country">Ülke:</label>
                                        <select class="form-control input-medium bfh-countries" id="countries" data-country="US"
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
                                                <option @if($recruitment->university==$university->name) selected @endif>{{ $university->name }}</option>
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
                                                <option @if($recruitment->branch==$university_branch->name) selected @endif>{{ $university_branch->name }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="learning_language">Öğrenim Dili:</label>
                                        <select class="form-control" id="learning_language" name="learning_language">
                                            <option></option>
                                            <option @if($recruitment->learning_language=="Türkçe") selected @endif>Türkçe</option>
                                            <option @if($recruitment->learning_language=="İngilizce") selected @endif>İngilizce</option>
                                            <option @if($recruitment->learning_language=="Diğer Diller") selected @endif>Diğer Diller</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="degree">Derece:</label>
                                        <select class="form-control" id="degree" name="degree">
                                            <option></option>
                                            <option @if($recruitment->degree=="Ön Lisans") selected @endif>Ön Lisans</option>
                                            <option @if($recruitment->degree=="Lisans") selected @endif>Lisans</option>
                                            <option @if($recruitment->degree=="Yüksek Lisans") selected @endif>Yüksek Lisans</option>
                                            <option @if($recruitment->degree=="Doktora") selected @endif>Doktora</option>
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
                                            <option @if($recruitment->application_status=="Online başvuru yaptı") selected @endif>Online başvuru yaptı</option>
                                            <option @if($recruitment->application_status=="Ofiste bilgi verildi") selected @endif>Ofiste bilgi verildi</option>
                                            <option @if($recruitment->application_status=="Evrak alındı") selected @endif>Evrak alındı</option>
                                            <option @if($recruitment->application_status=="Evrak üniversiteye iletildi") selected @endif>Evrak üniversiteye iletildi</option>
                                            <option @if($recruitment->application_status=="Başvurusu yapıldı") selected @endif>Başvurusu yapıldı</option>
                                            <option @if($recruitment->application_status=="Başvurusu onaylandı") selected @endif>Başvurusu onaylandı</option>
                                            <option @if($recruitment->application_status=="Öğrenci ön ödemeyi yaptı") selected @endif>Öğrenci ön ödemeyi yaptı</option>
                                            <option @if($recruitment->application_status=="Öğrenci kabul mektubu aldı") selected @endif>Öğrenci kabul mektubu aldı</option>
                                            <option @if($recruitment->application_status=="Kayıt tamamlandı") selected @endif>Kayıt tamamlandı</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="heard_by">Bizi Nereden Duydu?:</label>
                                        <select class="form-control" id="heard_by" name="heard_by">
                                            <option></option>
                                            <option @if($recruitment->heard_by=="Google/Reklam") selected @endif>Google/Reklam</option>
                                            <option @if($recruitment->heard_by=="Instagram") selected @endif>Instagram</option>
                                            <option @if($recruitment->heard_by=="Facebook") selected @endif>Facebook</option>
                                            <option @if($recruitment->heard_by=="Tavsiye") selected @endif>Tavsiye</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-12 col-md-6 col-lg-4 col-xl-3">
                                    <div class="form-group">
                                        <label for="agency">Acente:</label>
                                        <select class="form-control" id="agency" name="agency">
                                            <option></option>
                                            @foreach ($agencies as $agency)
                                                <option @if($recruitment->agency==$agency->name) selected @endif>{{ $agency->name }}</option>
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
                                            <input type="radio" class="form-check-input" @if($recruitment->consultancy=="Evet") checked @endif value="Evet"
                                                name="consultancy">Evet
                                        </label>
                                    </div>
                                    <div class="form-check-inline">
                                        <label class="form-check-label">
                                            <input type="radio" class="form-check-input" @if($recruitment->consultancy=="Hayır") checked @endif value="Hayır"
                                                name="consultancy">Hayır
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-6 col-xl-4">
                                    <div class="form-group">
                                        <label for="note">Not:</label>
                                        <textarea class="form-control" rows="5" id="notes" name="notes">{{$recruitment->notes}}</textarea>
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
{{-- countries dropdown is having "selected attirubute" according to value coming --}}
<script>
    $(document).ready(function () {
        countries_length = document.getElementById("countries").options.length;
        for (i = 0; i < countries_length; i++) {
            if (document.getElementById("countries").options[i].value == "{{ $recruitment->country }}") {
                document.getElementById("countries").options[i].setAttribute('selected', true);
            }
        }
    });
</script>
@endsection

@section('css')

@endsection
@section('title', "Temin Kaydet")
