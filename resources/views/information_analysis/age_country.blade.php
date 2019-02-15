@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <canvas id="age_chart" width="100" height="30"></canvas>
                </div>
            </div>
            <div class="row d-flex justify-content-center mt-5">
                <div class="col-12">
                    <canvas id="country_chart" width="100" height="30"></canvas>
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
    var counts = {};
    ages.forEach(function(x) { counts[x] = (counts[x] || 0)+1; });
    console.log(counts);
    keys = [];
    values=[];
    for(key in counts){
        keys.push(key);
        values.push(counts[key]);
    }
    var ctx = $("#age_chart");
    var myLineChart = new Chart(ctx, {
        type: 'line',
        data: {
                labels:keys,
                datasets: [{borderColor: 'rgba(38, 113, 117, 0.7)',backgroundColor: 'rgba(38, 113, 117, 0.7)', data: values,label:"Öğrenci Sayısı",fill:false}]
        },
        options: {
				responsive: true,
				legend: {position: 'top'},
				title: {display: true,text: 'Yaşlara Göre Öğrenci Sayısı Grafiği'},
                scales: {xAxes: [{display: true,scaleLabel: {display: true,labelString: 'Öğrenci Yaşları'}}],
						yAxes: [{display: true,scaleLabel: {display: true,labelString: 'Öğrenci Sayısı'},ticks: {min:0,stepSize: 1}}]}
		},
        
    });
</script>
<script>
        countries=[];
        @foreach($students as $student)
            countries.push("{{ $student->country }}");
        @endforeach
        var counts = {};
        countries.forEach(function(x) { counts[x] = (counts[x] || 0)+1; });
        keys = [];
        values=[];
        for(key in counts){
            keys.push(key);
            values.push(counts[key]);
        }
        var ctx = $("#country_chart");
        var myLineChart = new Chart(ctx, {
            type: 'line',
            data: {
                labels:keys,
                datasets: [{borderColor: 'rgb(255, 99, 132)',backgroundColor:'rgb(255, 99, 132)',data: values,label:"Öğrenci Sayısı",fill:false}]
            },
            options: {
				responsive: true,
				legend: {position: 'top'},
				title: {display: true,text: 'Ülkelere Göre Öğrenci Sayısı Grafiği'},
                scales: {yAxes: [{display: true,scaleLabel: {display: true,labelString: 'Öğrenci Sayısı'},ticks: {min:0,stepSize: 1}}]}
		    },
        });
</script>
@endsection


@section('css')

@endsection
@section('title', "Grafik")