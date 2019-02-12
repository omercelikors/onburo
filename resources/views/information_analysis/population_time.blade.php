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
                datasets:[
                            {
                                label: "Ocak",
                                backgroundColor: ['rgba(38, 113, 117, 0.7)'],
                                data: [{{ $_1month }}],
                            },
                            {
                                label: "Şubat",
                                backgroundColor: ['rgba(48, 63, 217, 0.7)'],
                                data: [{{ $_2month }}],
                            },
                            {
                                label: "Mart",
                                backgroundColor: ['rgba(348, 643, 217, 0.7)'],
                                data: [{{ $_3month }}],
                            },
                            {
                                label: "Nisan",
                                backgroundColor: ['rgba(155, 163, 40, 0.7)'],
                                data: [{{ $_4month }}],
                            },
                            {
                                label: "Mayıs",
                                backgroundColor: ['rgba(138, 113, 127, 0.7)'],
                                data: [{{ $_5month }}],
                            },
                            {
                                label: "Haziran",
                                backgroundColor: ['rgba(448, 43, 17, 0.4)'],
                                data: [{{ $_6month }}],
                            },
                            {
                                label: "Temmuz",
                                backgroundColor: ['rgba(583, 43, 297, 0.3)'],
                                data: [{{ $_7month }}],
                            },
                            {
                                label: "Ağustos",
                                backgroundColor: ['rgba(155, 13, 490, 0.7)'],
                                data: [{{ $_8month }}],
                            },
                            {
                                label: "Eylül",
                                backgroundColor: ['rgba(128, 613, 17, 0.7)'],
                                data: [{{ $_9month }}],
                            },
                            {
                                label: "Ekim",
                                backgroundColor: ['rgba(48, 30, 17, 0.7)'],
                                data: [{{ $_10month }}],
                            },
                            {
                                label: "Kasım",
                                backgroundColor: ['rgba(248, 63, 17, 0.7)'],
                                data: [{{ $_11month }}],
                            },
                            {
                                label: "Aralık",
                                backgroundColor: ['rgba(15, 13, 40, 0.7)'],
                                data: [{{ $_12month }}],
                            }
                ]
        },
        options: {
				    responsive: true,
				    title: {
                            display: true,
                            text: 'Aylara Göre Öğrenci Sayısı Grafiği'
                    },
                    scales: {
                            yAxes: [{scaleLabel: {display: true,labelString: 'Öğrenci Sayısı'},ticks: {min:0,stepSize: 1}}]
                    }
		},
    });
</script>

@endsection


@section('css')

@endsection