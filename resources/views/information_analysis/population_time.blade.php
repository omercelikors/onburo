@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <canvas id="population_time_chart" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script>
    var ctx = $("#population_time_chart");
    var myBarChart  = new Chart(ctx, {
        type: 'bar',
        data: {
            labels:["Ocak","Şubat","Mart","Nisan","Mayıs","Haziran","Temmuz","Ağustos","Eylül","Ekim","Kasım","Aralık"],
            datasets: [{
                        label: "Aylar-Öğrenci Sayısı Grafiği",
                        borderColor: 'rgb(255, 99, 132)',
                        data: [{{ $_1month }},{{ $_2month }},{{ $_3month }},{{ $_4month }},{{ $_5month }},{{ $_6month }},{{ $_7month }},{{ $_8month }},{{ $_9month }},{{ $_10month }},{{ $_11month }},{{ $_12month }}],
            }]
        },
    });
</script>

@endsection


@section('css')

@endsection