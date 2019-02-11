@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <canvas id="myChart" width="100" height="50"></canvas>
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
                datasets: [{
                    label: 'Kurs-Öğrenci Sayısı Grafiği',
                    data: [{{ $course_student_number->A1 }}, {{ $course_student_number->B2 }}],
                    backgroundColor: ['rgba(255, 99, 132, 0.2)','rgba(54, 162, 235, 0.2)'],
                }]
        },
    });
</script>
@endsection


@section('css')

@endsection