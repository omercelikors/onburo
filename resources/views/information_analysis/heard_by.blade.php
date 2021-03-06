@extends('layouts.master')
@section('content')
<main class="container-fluid mt-5">
    <div class="card my-3">
        <div class="card-header">Bilgi ve Analiz</div>
        <div class="card-body">
            <div class="row d-flex justify-content-center">
                <div class="col-12">
                    <canvas id="heard_by_chart" width="100" height="30"></canvas>
                </div>
            </div>
        </div>
    </div>
</main>
@endsection

@section('js')
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.3/Chart.bundle.js"></script>
<script>
    platforms=[];
    @foreach($students as $student)
        if("{{ $student->heard_by_status }}"!=""){
            platforms.push("{{ $student->heard_by_status }}");
        }
    @endforeach
    platforms.sort();
    formatted_platforms=[];
    platform_numbers=[];
    var current = null;
    var cnt = 0;
    for (var i = 0; i <= platforms.length; i++) {
        if (platforms[i] != current) {
            if (cnt > 0) {
                formatted_platforms.push(current);
                platform_numbers.push(cnt);
            }
            current = platforms[i];
            cnt = 1;
        } else {
            cnt++;
        }
    }
    var ctx = $("#heard_by_chart");
    var myBarChart  = new Chart(ctx, {
        type: 'bar',
        data: {
                datasets:[
                            {
                                label: formatted_platforms[0],
                                backgroundColor: ['rgba(38, 113, 117, 0.7)'],
                                data: [platform_numbers[0]],
                            },
                            {
                                label: formatted_platforms[1],
                                backgroundColor: ['rgba(48, 63, 217, 0.7)'],
                                data: [platform_numbers[1]],
                            },
                            {
                                label: formatted_platforms[2],
                                backgroundColor: ['rgba(348, 63, 217, 0.7)'],
                                data: [platform_numbers[2]],
                            },
                            {
                                label: formatted_platforms[3],
                                backgroundColor: ['rgba(155, 163, 40, 0.7)'],
                                data: [platform_numbers[3]],
                            },
                            {
                                label: formatted_platforms[4],
                                backgroundColor: ['rgba(152, 63, 40, 0.7)'],
                                data: [platform_numbers[4]],
                            }
                ]
        },
        options: {
				    responsive: true,
				    title: {
                            display: true,
                            text: 'Duyulan Platforma G??re ????renci Say??s?? Grafi??i'
                    },
                    scales: {
                            yAxes: [{scaleLabel: {display: true,labelString: '????renci Say??s??'},ticks: {min:0,stepSize: 1}}]
                    }
		},
    });
</script>

@endsection


@section('css')

@endsection
@section('title', "Grafik")