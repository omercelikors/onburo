@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row my-3 d-flex justify-content-center">
                <div class="col-3">
                    <a href="{{ route('expected_payment_show') }}">Belirli Aralıkta Beklenen Ödeme</a>
                </div>
            </div>
            <div class="row my-3 d-flex justify-content-center">
                <div class="col-3">
                    <a href="{{ route('gain_payment_show') }}">Belirli Aralıkta Kazanılan Toplam Para</a>
                </div>
            </div>
            <div class="row my-3 d-flex justify-content-center">
                <div class="col-6">
                    <a href="{{ route('other_installment_show') }}">Bu Ay Beklenen Ödeme - Ortalama Kayıt Ödemesi - 220 Dolar Altında Kaydedilen Kişi Sayısı</a>
                </div>
            </div>




            <div class="row my-3 d-flex justify-content-center">
                <div class="col-3">
                    <a href="#">Belirli Aralıkta Kazanılan Toplam Para</a>
                </div>
            </div>
            <div class="row my-3 d-flex justify-content-center">
                    <div class="col-3">
                        <a href="#">Belirli Aralıkta Beklenen Ödeme</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-3">
                        <a href="#">Bu Ay Beklenen Ödeme</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-3">
                        <a href="#">Belirli Aralıkta Kazanılan Toplam Para</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-3">
                        <a href="#">Ortalama Kayıt Ödemesi</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-3">
                        <a href="#">220 Dolar Altında Kaydedilen Kişi Sayısı</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-3">
                        <a href="#">Belirli Aralıkta Kazanılan Toplam Para</a>
                    </div>
                </div>
        </div>
    </div>
</main>
@endsection

@section('js')
@endsection

@section('css')
@endsection