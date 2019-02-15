@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <canvas id="myChart" width="100" height="30"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script>
    var ctx = $("#myChart");
    var myDoughnutChart = new Chart(ctx, {
        type: 'doughnut',
        data: {
                labels: ["A1","B2"],
                datasets: [{data: [{{ $course_student_number->A1 }}, {{ $course_student_number->B2 }}],backgroundColor: ['rgba(38, 163, 117, 0.7)','rgba(255, 163, 40, 0.7)']}]
        },
        options: {
				responsive: true,
				legend: {position: 'top'},
				title: {display: true,text: 'Kurslara Göre Öğrenci Sayısı Grafiği'}
		}
    });
</script>
@endsection


@section('css')

@endsection
@section('title', "Grafik")