@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('teacher_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Öğretmen Kayıt</div>
            <div class="card-body">
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-12 col-md-12 col-xl-10 px-0 my-3">
                        <div class="card-header">Öğretmen Bilgileri</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" id="name" name="name" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control" oninput="this.value = this.value.toUpperCase()" id="surname" name="surname" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="e_mail">E-posta Adresi:</label>
                                        <input type="email" class="form-control" id="e_mail" name="e_mail">
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="telephone">*Telefon:</label>
                                        <input type="number" class="form-control" id="telephone" name="telephone" required>
                                    </div>
                                </div>
                                <div class="col-12 col-md-3 col-xl-2">
                                    <div class="form-group">
                                        <label for="birthdate">*Doğum Tarihi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="birthdate" name="birthdate" autocomplete="off" placeholder="gg.aa.yyyy" required>
                                        </div>
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
<script>
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#birthdate').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        value:'01.01.2000',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1
    });
</script>
@endsection

@section('css')

@endsection

@section('title', "Öğretmen Kaydet")