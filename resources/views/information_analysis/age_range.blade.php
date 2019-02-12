@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-6">
                    <canvas id="age_range_status_chart" width="100" height="50"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script>
        ages=[];
        @foreach($students as $student)
            ages.push({{ $student->age }});
        @endforeach
        ages.sort();
        formatted_ages=[];
        age_numbers=[];
    
        var current = null;
        var cnt = 0;
        for (var i = 0; i <= ages.length; i++) {
            if (ages[i] != current) {
                if (cnt > 0) {
                    formatted_ages.push(current);
                    age_numbers.push(cnt);
                }
                current = ages[i];
                cnt = 1;
            } else {
                cnt++;
            }
        }
       
        var ctx = $("#age_range_status_chart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:formatted_ages,
                datasets: [{borderColor: 'rgb(255, 99, 132)',data: age_numbers}]
            },
            options: {
				responsive: true,
				legend: {position: 'top'},
				title: {display: true,text: 'Yaş-Üniversiteye Gitmek İsteyen Sayısı Grafiği'},
                scales: {xAxes: [{display: true,scaleLabel: {display: true,labelString: 'Öğrenci Yaşları'}}],
						yAxes: [{display: true,scaleLabel: {display: true,labelString: 'Üniversiteye Gitmek İsteyen Sayısı'}}]}
		    },
        });
</script>

@endsection


@section('css')

@endsection