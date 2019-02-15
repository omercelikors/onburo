@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row my-2 d-flex justify-content-center">
                <div class="card col-3 px-0 mx-3 my-3">
                    <div class="card-header">Bu Ay Beklenen Ödeme</div>
                    <div class="card-body">
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Beklenen Ödeme</label>
                                    <input type="text" class="form-control" @isset($expected_total_for_this_month_tl,$expected_total_for_this_month_dl) value="{{ $expected_total_for_this_month_tl }} TL + {{ $expected_total_for_this_month_dl }} $" @endisset readonly>
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
                                    <input type="text" @isset($average_gain) value="{{ $average_gain }} TL" @endisset class="form-control" id="surname"
                                        readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card col-3 px-0 mx-3 my-3">
                    <div class="card-header">220 Dolar Altında Kaydedilen Kişi Sayısı</div>
                    <div class="card-body">
                        <div class="row my-2 d-flex justify-content-center">
                            <div class="col-6">
                                <div class="form-group">
                                    <label for="name">Kişi Sayısı:</label>
                                    <input type="text" class="form-control" @isset($total_students_under_dolar) value="{{ $total_students_under_dolar }}" @endisset
                                         readonly>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@endsection

@section('js')
<script>

</script>
@endsection
@section('title', "Sorgu")