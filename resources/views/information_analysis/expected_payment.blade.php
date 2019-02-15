@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <form method="post" action="{{ route('expected_payment_calculate') }}" enctype="multipart/form-data">
        @csrf
        <div class="card my-3">
            <div class="card-header">Bilgi ve Analiz</div>
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
                                            <input id="start_date" name="start_date" autocomplete="off"
                                                value="{{ session('start_date') }}" placeholder="gg.aa.yyyy" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="birthdate">Aralık Bitişi:</label>
                                        <div class="gj-margin-top-10">
                                            <input id="end_date" name="end_date" autocomplete="off"
                                                value="{{ session('end_date') }}" placeholder="gg.aa.yyyy" required>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-3">
                                    <div class="form-group">
                                        <label for="name">Beklenen Ödeme</label>
                                        <input type="text" class="form-control" value="{{ session('total_for_between_tl') }} TL + {{ session('total_for_between_dl') }} $"
                                            readonly>
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
<script>
    $('#start_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        
    });
    
    $('#end_date').datepicker({
        locale: 'tr-tr',
        format:'dd.mm.yyyy',
        uiLibrary: 'bootstrap4',
        weekStartDay: 1,
        
    });
</script>
@endsection
@section('title', "Sorgu")