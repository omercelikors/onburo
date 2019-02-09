@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('candidate_student_register') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Ödeme Bilgi ve Analiz</div>
            <div class="card-body">

                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-5 px-0 mx-3 my-3">
                        <div class="card-header">Beklenen Ödemeler</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-5 px-0 mx-3 my-3">
                        <div class="card-header">Bu Ay Beklenen Ödeme</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control" id="surname" name="surname" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-5 px-0 mx-3 my-3">
                        <div class="card-header">Kazanılan Toplam Para(TL/Dolar)</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-5 px-0 mx-3 my-3">
                        <div class="card-header">Ortalama Kayıt Ödemesi</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control" id="surname" name="surname" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-5 px-0 mx-3 my-3">
                        <div class="card-header">220 Dolar Altında Kaydedilen Kişi Sayısı</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="name">*Adı:</label>
                                        <input type="text" class="form-control" id="name" name="name" required>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-5 px-0 mx-3 my-3">
                        <div class="card-header">Kişisel Bilgiler</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-2">
                                    <div class="form-group">
                                        <label for="name">*Soyadı:</label>
                                        <input type="text" class="form-control" id="surname" name="surname" required>
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
                <button id="submit_button" class="btn btn-primary" type="submit">Sorgula</button>
            </div>
        </div>
    </form>
</main>
@endsection

@section('js')
{{-- country dropdown js --}}
<script src="{{ asset('js/extensions/bootstrap-formhelpers.min.js') }}"></script>
{{-- date picker --}}
<script>
    today = new Date(new Date().getFullYear(), new Date().getMonth(), new Date().getDate());
    $('#birthdate').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        maxDate: today
    });
</script>
@endsection

@section('css')

@endsection