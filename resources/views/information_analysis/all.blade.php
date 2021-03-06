@extends('layouts.master')
@section('content')
<main class="container-fluid mt-3">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="list-group">
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-3 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('expected_payment_show') }}">Belirli Aralıkta Beklenen Ödeme</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-3 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('gain_payment_show') }}">Belirli Aralıkta Kazanılan Toplam Para</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-6 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('other_installment_show') }}">Bu Ay Beklenen Ödeme - Ortalama Kayıt Ödemesi -220 Dolar Altında Kaydedilen Kişi Sayısı</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-3 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('course_student_number_show') }}">Kurslara Göre Öğrenci Sayısı Grafiği</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-3 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('age_country_show') }}">Yaş ve Ülkeye Göre Öğrenci Sayısı Grafiği</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-3 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('heard_by_show') }}">Duyulan Platform Göre Öğrenci Sayısı Grafiği</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-3 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('abandon_show') }}">Ayrılma Sebebine Göre Öğrenci Sayısı Grafiği</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-3 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('population_time_show') }}">Aylara Göre Öğrenci Sayısı Grafiği</a>
                    </div>
                </div>
                <div class="row my-3 d-flex justify-content-center">
                    <div class="col-12 col-md-5 col-xl-4 text-center">
                        <a class="list-group-item list-group-item-action" href="{{ route('age_range_show') }}">Yaşlara Göre Öğrencilerin Üniversiteye Gitme İsteği
                            Grafiği</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection
@section('title', "Bilgi ve Analiz Listesi")
