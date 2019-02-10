@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('payment_analysis_calculate') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Ödeme Bilgi ve Analiz</div>
            <div class="card-body">

                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-6 px-0 mx-3 my-3">
                        <div class="card-header">Belirli Aralıkta Beklenen Ödeme</div>
                        <div class="card-body">
                            <div class="row my-3 d-flex justify-content-center">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="birthdate">Aralık Başlangıcı:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="expected_start_date" name="expected_start_date" autocomplete="off" value="{{ session('expected_start_date') }}" placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="birthdate">Aralık Bitişi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="expected_end_date" name="expected_end_date" autocomplete="off" value="{{ session('expected_end_date') }}" placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">Beklenen Ödeme</label>
                                        <input type="text" class="form-control" value="{{ session('expected_total_for_between_tl') }} TL + {{ session('expected_total_for_between_dl') }} $" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-3 px-0 mx-3 my-3">
                        <div class="card-header">Bu Ay Beklenen Ödeme</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Beklenen Ödeme</label>
                                        <input type="text" class="form-control" value="{{ $expected_total_for_this_month_tl }} TL + {{ $expected_total_for_this_month_dl }} $" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                
                <div class="row my-2 d-flex justify-content-center">
                    <div class="card col-6 px-0 mx-3 my-3">
                        <div class="card-header">Belirli Aralıkta Kazanılan Toplam Para</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="birthdate">Aralık Başlangıcı:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="gain_start_date" name="gain_start_date" autocomplete="off" value="{{ session('gain_start_date') }}" placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="birthdate">Aralık Bitişi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="gain_end_date" name="gain_end_date" autocomplete="off" value="{{ session('gain_end_date') }}" placeholder="gg.aa.yyyy">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">Kazanılan Para</label>
                                        <input type="text" class="form-control" id="name" name="name" value="{{ session('gain_total_for_between_tl') }} TL + {{ session('gain_total_for_between_dl') }} $" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card col-3 px-0 mx-3 my-3">
                        <div class="card-header">Ortalama Kayıt Ödemesi</div>
                        <div class="card-body">
                            <div class="row my-2 d-flex justify-content-center">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="name">Ortalama Ödeme:</label>
                                        <input type="text" value="{{ $average_gain }} TL" class="form-control" id="surname" name="surname" readonly>
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
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">Kişi Sayısı:</label>
                                        <input type="text" class="form-control" value="{{ $total_students_under_dolar }}" id="name" name="name" readonly>
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
    $('#expected_start_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        
    });

    $('#expected_end_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        
    });

    $('#gain_start_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        
    });

    $('#gain_end_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        
    });
</script>
@endsection

@section('css')

@endsection